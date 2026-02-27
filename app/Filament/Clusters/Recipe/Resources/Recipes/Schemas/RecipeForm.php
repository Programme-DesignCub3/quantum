<?php

namespace App\Filament\Clusters\Recipe\Resources\Recipes\Schemas;

use App\Constant\AcceptedFileConstant;
use Filament\Forms\Components\FileUpload;
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

class RecipeForm
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
                                        ->label('Gambar')
                                        ->collection('recipes')
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
                            Textarea::make('description')
                                ->label('Deskripsi')
                                ->rows(3)
                                ->belowContent('Deskripsi singkat mengenai resep.')
                                ->required(),
                            RichEditor::make('materials')
                                ->label('Bahan')
                                ->toolbarButtons([
                                    ['bold', 'italic', 'underline', 'strike', 'subscript', 'superscript'],
                                    ['undo', 'redo'],
                                ])
                                ->required(),
                            Repeater::make('steps')
                                ->label('Langkah-langkah')
                                ->reorderableWithButtons()
                                ->required()
                                ->schema([
                                    Fieldset::make('Gambar Langkah')
                                        ->schema([
                                            FileUpload::make('image')
                                                ->label('Gambar')
                                                ->maxSize(2048)
                                                ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                                                ->belowContent('File berupa format gambar .jpeg .jpg .png .webp. Maksimal ukuran file 2MB.')
                                                ->directory('recipe-steps')
                                                ->columnSpanFull()
                                                ->required(),
                                            TextInput::make('image_alt_text')
                                                ->label('Teks Alternatif (Alt Text)')
                                                ->autocomplete(false)
                                                ->columnSpanFull(),
                                        ]),
                                    Textarea::make('explanation')
                                        ->label('Penjelasan Langkah')
                                        ->rows(3)
                                        ->required(),
                                ])
                        ])->columnSpan(7),
                        Section::make([
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
                            ToggleButtons::make('is_premium')
                                ->label('Resep Premium')
                                ->options([
                                    1 => 'Ya',
                                    0 => 'Tidak',
                                ])
                                ->colors([
                                    1 => 'success',
                                    0 => 'warning',
                                ])
                                ->inline()
                                ->default(0)
                                ->columnSpanFull()
                                ->required(),
                            SpatieMediaLibraryFileUpload::make('recipe_file')
                                ->label('File Resep')
                                ->collection('recipe-files')
                                ->maxSize(5120)
                                ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_DOCUMENT)
                                ->columnSpanFull()
                                ->belowContent('File berupa format dokumen .pdf. Maksimal ukuran file 5MB.'),
                            Select::make('recipe_category_id')
                                ->label('Kategori Resep')
                                ->relationship('category', 'name')
                                ->preload()
                                ->searchable()
                                ->required(),
                            TextInput::make('cook_time')
                                ->label('Perkiraan Waktu Memasak (menit)')
                                ->numeric()
                                ->prefixIcon('heroicon-o-clock')
                                ->suffix('menit')
                                ->minValue(1)
                                ->required(),
                            TextInput::make('portion')
                                ->label('Jumlah Porsi')
                                ->numeric()
                                ->prefixIcon('heroicon-o-user-group')
                                ->suffix('porsi')
                                ->minValue(1)
                                ->required(),
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
                                        ->belowContent('Secara default, sistem akan menggunakan deskripsi dari konten yang diinput sebelumnya. Namun, Anda dapat menyesuaikannya untuk tujuan SEO.'),
                                    SpatieTagsInput::make('tags')
                                        ->label('Keywords')
                                        ->type('recipe')
                                        ->placeholder('Tambah keyword')
                                        ->hint('Tekan enter untuk menambahkan.')
                                        ->columnSpanFull()
                                        ->required(),
                                ])
                        ])->columnSpan(5),
                    ])
            ]);
    }
}
