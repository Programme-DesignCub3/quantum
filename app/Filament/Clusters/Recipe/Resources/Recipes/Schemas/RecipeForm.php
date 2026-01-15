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
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
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
                            SpatieMediaLibraryFileUpload::make('primary_image')
                                ->label('Gambar Utama')
                                ->collection('recipes')
                                ->image()
                                ->maxSize(2048)
                                ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                                ->columnSpanFull()
                                ->belowContent('File berupa format gambar .jpeg .jpg .png .webp. Maksimal ukuran file 2MB.')
                                ->required(),
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
                            Repeater::make('materials')
                                ->label('Bahan-bahan')
                                ->reorderableWithButtons()
                                ->required()
                                ->schema([
                                    RichEditor::make('value')
                                        ->label('Bahan')
                                        ->toolbarButtons(['bold', 'italic', 'underline'])
                                        ->required(),
                                ]),
                            Repeater::make('steps')
                                ->label('Langkah-langkah')
                                ->reorderableWithButtons()
                                ->required()
                                ->schema([
                                    FileUpload::make('image')
                                        ->label('Gambar Langkah')
                                        ->maxSize(2048)
                                        ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                                        ->belowContent('File berupa format gambar .jpeg .jpg .png .webp. Maksimal ukuran file 2MB.')
                                        ->directory('recipe-steps')
                                        ->required(),
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
                            SpatieTagsInput::make('tags')
                                ->label('Tag')
                                ->type('recipe')
                                ->placeholder('Tambah tag')
                                ->hint('Tekan enter untuk menambahkan tag.')
                                ->required(),
                        ])->columnSpan(5),
                    ])
            ]);
    }
}
