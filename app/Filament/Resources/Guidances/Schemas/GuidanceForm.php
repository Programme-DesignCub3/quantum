<?php

namespace App\Filament\Resources\Guidances\Schemas;

use App\Constant\AcceptedFileConstant;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class GuidanceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(12)
                    ->columnSpanFull()
                    ->schema([
                        Section::make([
                            Fieldset::make('Gambar Utama')
                                ->schema([
                                    SpatieMediaLibraryFileUpload::make('primary_image')
                                        ->label('Gambar Utama')
                                        ->collection('guidances')
                                        ->image()
                                        ->maxSize(2048)
                                        ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                                        ->columnSpanFull()
                                        ->belowContent('File berupa format gambar .jpeg .jpg .png .webp. Maksimal ukuran file 2MB.')
                                        ->required()
                                        ->customProperties(function (Get $get) {
                                            return [
                                                'caption' => $get('primary_image_caption') ?? null,
                                                'alt_text' => $get('primary_image_alt_text') ?? null,
                                            ];
                                        }),
                                    TextInput::make('primary_image_caption')
                                        ->label('Keterangan (Caption)')
                                        ->autocomplete(false)
                                        ->columnSpanFull(),
                                    TextInput::make('primary_image_alt_text')
                                        ->label('Teks Alternatif (Alt Text)')
                                        ->autocomplete(false)
                                        ->columnSpanFull(),
                                ]),
                            TextInput::make('title')
                                ->label('Judul')
                                ->autocomplete(false)
                                ->required()
                                ->columnSpanFull(),
                            Select::make('product_category_id')
                                    ->label('Kategori')
                                    ->relationship('category', 'name')
                                    ->required(),
                            ToggleButtons::make('is_published')
                                    ->label('Status Publikasi')
                                    ->options([
                                        1 => 'Publik',
                                        0 => 'Draf',
                                    ])
                                    ->colors([
                                        1 => 'success',
                                        0 => 'warning',
                                    ])
                                    ->inline()
                                    ->default(1)
                                    ->columnSpanFull()
                                    ->required(),
                            Hidden::make('excerpt'),
                            Builder::make('content')
                                ->label('Konten')
                                ->blockNumbers(false)
                                ->reorderableWithButtons()
                                ->required()
                                ->blocks([
                                    Block::make('paragraph')
                                        ->label('Paragraf')
                                        ->schema([
                                            RichEditor::make('value')
                                                ->label('Paragraf')
                                                ->toolbarButtons(['bold', 'italic', 'underline'])
                                                ->required(),
                                        ]),
                                    Block::make('steps')
                                        ->label('Langkah-langkah')
                                        ->schema([
                                            Repeater::make('value')
                                                ->label('Langkah')
                                                ->reorderableWithButtons()
                                                ->minItems(2)
                                                ->required()
                                                ->schema([
                                                    Fieldset::make('Gambar Langkah')
                                                        ->schema([
                                                            FileUpload::make('image')
                                                                ->label('Gambar')
                                                                ->belowContent('File berupa format gambar .jpeg .jpg .png .webp Maksimal ukuran file 2MB.')
                                                                ->image()
                                                                ->maxFiles(1)
                                                                ->maxSize(2048)
                                                                ->directory('guidance-steps')
                                                                ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                                                                ->columnSpanFull()
                                                                ->required(),
                                                            TextInput::make('image_alt_text')
                                                                ->label('Teks Alternatif (Alt Text)')
                                                                ->autocomplete(false)
                                                                ->columnSpanFull(),
                                                        ]),
                                                    TextInput::make('subtitle')
                                                        ->label('Judul')
                                                        ->columnSpanFull()
                                                        ->required(),
                                                    Textarea::make('description')
                                                        ->label('Deskripsi')
                                                        ->rows(3)
                                                        ->columnSpanFull()
                                                        ->required(),
                                                ])
                                        ]),
                                ])
                        ])->columnSpan(7),
                        Section::make([
                            Fieldset::make('Meta Tag (SEO)')
                                ->schema([
                                    TextInput::make('meta_title')
                                        ->label('Title')
                                        ->autocomplete(false)
                                        ->columnSpanFull()
                                        ->belowContent('Secara default, sistem akan menggunakan judul yang sama dengan judul yang diinput sebelumnya. Namun, Anda dapat menyesuaikannya untuk tujuan SEO.'),
                                    TextInput::make('meta_description')
                                        ->label('Description')
                                        ->autocomplete(false)
                                        ->columnSpanFull()
                                        ->belowContent('Secara default, sistem akan menggunakan potongan (excerpt) dari konten yang diinput sebelumnya. Namun, Anda dapat menyesuaikannya untuk tujuan SEO.'),
                                    SpatieTagsInput::make('tags')
                                        ->label('Keywords')
                                        ->type('guidance')
                                        ->placeholder('Tambah keyword')
                                        ->hint('Tekan enter untuk menambahkan.')
                                        ->columnSpanFull(),
                                ])
                        ])->columnSpan(5)
                    ])
            ]);
    }
}
