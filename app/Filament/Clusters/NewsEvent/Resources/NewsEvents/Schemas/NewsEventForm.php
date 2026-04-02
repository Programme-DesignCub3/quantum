<?php

namespace App\Filament\Clusters\NewsEvent\Resources\NewsEvents\Schemas;

use App\Constant\AcceptedFileConstant;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class NewsEventForm
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
                                        ->collection('news-events')
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
                            Hidden::make('excerpt'),
                            Builder::make('content')
                                ->label('Isi Konten')
                                ->reorderableWithButtons()
                                ->required()
                                ->blocks([
                                    Block::make('paragraph')
                                        ->label('Paragraf')
                                        ->schema([
                                            RichEditor::make('paragraph')
                                                ->label('Paragraf')
                                                ->toolbarButtons([
                                                    ['bold', 'italic', 'underline', 'strike', 'subscript', 'superscript', 'link'],
                                                    ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                                                    ['bulletList', 'orderedList'],
                                                    ['undo', 'redo'],
                                                ])
                                                ->columnSpanFull()
                                                ->required(),
                                        ]),
                                    Block::make('image')
                                        ->label('Gambar')
                                        ->schema([
                                            FileUpload::make('image')
                                                ->label('Gambar')
                                                ->image()
                                                ->maxFiles(1)
                                                ->maxSize(2048)
                                                ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                                                ->columnSpanFull()
                                                ->belowContent('File berupa format gambar .jpeg .jpg .png .webp. Maksimal ukuran file 2MB.')
                                                ->required(),
                                            Flex::make([
                                                Select::make('image_width')
                                                    ->label('Ukuran Gambar')
                                                    ->default('auto')
                                                    ->options([
                                                        'auto' => 'Auto',
                                                        '100' => '100%',
                                                        '75' => '75%',
                                                        '50' => '50%',
                                                        '25' => '25%',
                                                    ]),
                                                Select::make('image_align')
                                                    ->label('Letak Gambar')
                                                    ->default('center')
                                                    ->options([
                                                        'flex-start' => 'Kiri',
                                                        'center' => 'Tengah',
                                                        'flex-end' => 'Kanan',
                                                    ]),
                                            ]),
                                            TextInput::make('image_caption')
                                                ->label('Keterangan (Caption)')
                                                ->autocomplete(false)
                                                ->columnSpanFull(),
                                            TextInput::make('image_alt_text')
                                                ->label('Teks Alternatif (Alt Text)')
                                                ->autocomplete(false)
                                                ->columnSpanFull(),
                                        ]),
                                ]),
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
                            DatePicker::make('published_at')
                                ->label('Tanggal Publikasi')
                                ->default(now())
                                ->required(),
                            Select::make('news_event_category_id')
                                ->label('Kategori Berita & Event')
                                ->relationship('category', 'name')
                                ->preload()
                                ->searchable()
                                ->required(),
                            TextInput::make('read_time')
                                ->label('Perkiraan Waktu Baca (menit)')
                                ->numeric()
                                ->prefixIcon('heroicon-o-clock')
                                ->suffix('menit')
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
                                        ->belowContent('Secara default, sistem akan menggunakan potongan (excerpt) dari konten yang diinput sebelumnya. Namun, Anda dapat menyesuaikannya untuk tujuan SEO.'),
                                    SpatieTagsInput::make('tags')
                                        ->label('Keywords')
                                        ->type('news-event')
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
