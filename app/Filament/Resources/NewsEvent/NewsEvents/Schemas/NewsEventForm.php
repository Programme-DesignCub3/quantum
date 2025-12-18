<?php

namespace App\Filament\Resources\NewsEvent\NewsEvents\Schemas;

use App\Constant\AcceptedFileConstant;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
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
                            SpatieMediaLibraryFileUpload::make('primary_image')
                                ->label('Gambar Utama')
                                ->collection('news-events')
                                ->image()
                                ->maxSize(2048)
                                ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                                ->columnSpanFull()
                                ->belowContent('File berupa format gambar .jpeg .jpg .png .webp. Maksimal ukuran file 2MB.')
                                ->required(),
                            TextInput::make('title')
                                ->label('Judul')
                                ->required()
                                ->columnSpanFull(),
                            RichEditor::make('content')
                                ->label('Isi Konten')
                                ->toolbarButtons([
                                    ['bold', 'italic', 'underline', 'strike', 'subscript', 'superscript', 'link'],
                                    ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                                    ['bulletList', 'orderedList'],
                                    ['attachFiles'],
                                    ['undo', 'redo'],
                                ])
                                ->belowContent('File yang diupload berupa gambar berukuran maksimal 2 MB dengan format .jpeg .jpg .png .webp.')
                                ->fileAttachmentsMaxSize(2048)
                                ->fileAttachmentsAcceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                                ->fileAttachmentsDirectory('news-event-contents')
                                ->required()
                        ])->columnSpan(8),
                        Section::make([
                            ToggleButtons::make('is_published')
                                ->label('Status Publikasi')
                                ->options([
                                    1 => 'Publikasi',
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
                            SpatieTagsInput::make('tags')
                                ->label('Tag')
                                ->type('news-event')
                                ->placeholder('Tambah tag')
                                ->hint('Tekan enter untuk menambahkan tag.'),
                        ])->columnSpan(4),
                    ])
            ]);
    }
}
