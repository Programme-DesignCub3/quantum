<?php

namespace App\Filament\Resources\Product\Products\Schemas;

use App\Constant\AcceptedFileConstant;
use Filament\Actions\Action;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Support\RawJs;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(12)
                    ->columnSpanFull()
                    ->schema([
                        Section::make([
                            SpatieMediaLibraryFileUpload::make('images')
                                ->label('Gambar Produk')
                                ->collection('products')
                                ->image()
                                ->multiple()
                                ->reorderable()
                                ->maxSize(2048)
                                ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                                ->columnSpanFull()
                                ->belowContent('File berupa format gambar .jpeg .jpg .png .webp dengan latar belakang putih. Maksimal ukuran file 2MB. Bisa mengunggah lebih dari satu gambar.')
                                ->panelLayout('grid')
                                ->required(),
                            Flex::make([
                                Select::make('product_category_id')
                                    ->label('Kategori Produk')
                                    ->relationship('category', 'name')
                                    ->preload()
                                    ->reactive()
                                    ->afterStateUpdated(fn(Set $set) => $set('variant_id', null))
                                    ->required(),
                                Select::make('variant_id')
                                    ->label('Jenis Produk')
                                    ->disabled(fn(Get $get) => blank($get('product_category_id')))
                                    ->relationship(
                                        name: 'variant',
                                        titleAttribute: 'name',
                                        modifyQueryUsing: fn($query, Get $get) => $query
                                            ->where('product_category_id', $get('product_category_id'))
                                    )
                                    ->searchable()
                                    ->preload()
                                    ->belowContent('Pilih kategori produk terlebih dahulu.')
                                    ->required(),
                            ]),
                            TextInput::make('name')
                                ->label('Nama Produk')
                                ->autocomplete(false)
                                ->columnSpanFull()
                                ->required(),
                            TextInput::make('price')
                                ->label('Harga Produk')
                                ->prefix('Rp')
                                ->mask(RawJs::make('$money($input)'))
                                ->stripCharacters('.')
                                ->autocomplete(false)
                                ->columnSpanFull()
                                ->required(),
                            Builder::make('specs')
                                ->label('Spesifikasi')
                                ->blockNumbers(false)
                                ->reorderable(false)
                                ->maxItems(4)
                                ->blocks([
                                    Block::make('furnace_type')
                                        ->label('Tungku')
                                        ->icon('heroicon-o-lifebuoy')
                                        ->maxItems(1)
                                        ->schema([
                                            Select::make('types')
                                                ->label('Tungku')
                                                ->relationship('types', 'name')
                                                ->prefixIcon(Heroicon::Lifebuoy)
                                                ->preload()
                                                ->searchable()
                                                ->required(),
                                        ]),
                                    Block::make('power_type')
                                        ->label('Power')
                                        ->icon('heroicon-o-power')
                                        ->maxItems(1)
                                        ->schema([
                                            Select::make('types')
                                                ->label('Power')
                                                ->relationship('types', 'name')
                                                ->prefixIcon(Heroicon::Power)
                                                ->preload()
                                                ->searchable()
                                                ->required(),
                                        ]),
                                    Block::make('fuel_type')
                                        ->label('Gas')
                                        ->icon('heroicon-o-fire')
                                        ->maxItems(1)
                                        ->schema([
                                            Select::make('types')
                                                ->label('Gas')
                                                ->relationship('types', 'name')
                                                ->prefixIcon(Heroicon::Fire)
                                                ->preload()
                                                ->searchable()
                                                ->required(),
                                        ]),
                                    Block::make('length_type')
                                        ->label('Panjang')
                                        ->icon('heroicon-o-arrow-long-right')
                                        ->maxItems(1)
                                        ->schema([
                                            Select::make('types')
                                                ->label('Panjang')
                                                ->relationship('types', 'name')
                                                ->prefixIcon(Heroicon::ArrowLongRight)
                                                ->preload()
                                                ->searchable()
                                                ->required(),
                                        ])
                                ]),
                            Builder::make('specs_detail')
                                ->label('Detail Spesifikasi')
                                ->blockNumbers(false)
                                ->reorderable(false)
                                ->maxItems(3)
                                ->required()
                                ->blocks([
                                    Block::make('dimension_image')
                                        ->label('Dimensi (Image)')
                                        ->icon('heroicon-o-arrows-pointing-out')
                                        ->maxItems(1)
                                        ->schema([
                                            SpatieMediaLibraryFileUpload::make('value')
                                                ->label('Gambar Dimensi')
                                                ->belowContent('File berupa format gambar .jpeg .jpg .png .webp dengan latar belakang putih. Maksimal ukuran file 2MB.')
                                                ->collection('dimension_product')
                                                ->image()
                                                ->maxSize(2048)
                                                ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                                                ->required(),
                                        ]),
                                    Block::make('dimension_text')
                                        ->label('Dimensi (Teks)')
                                        ->icon('heroicon-o-arrows-pointing-out')
                                        ->maxItems(1)
                                        ->schema([
                                            KeyValue::make('value')
                                                ->label('Dimensi')
                                                ->keyLabel('Atribut')
                                                ->valueLabel('Nilai')
                                                ->reorderable()
                                                ->required(),
                                        ]),
                                    Block::make('detail')
                                        ->label('Detail Spesifikasi')
                                        ->icon('heroicon-o-clipboard-document-list')
                                        ->maxItems(1)
                                        ->schema([
                                            KeyValue::make('value')
                                                ->label('Detail')
                                                ->keyLabel('Atribut')
                                                ->valueLabel('Nilai')
                                                ->reorderable()
                                                ->required(),
                                        ]),
                                ]),
                            Builder::make('gallery')
                                ->label('Galeri Produk')
                                ->blockNumbers(false)
                                ->reorderable(false)
                                ->required()
                                // ->deleteAction(
                                //     function (Action $action, $state) {
                                //         $action->before(function ($state, array $arguments) {
                                //             // dd($arguments['item']);
                                //         });
                                //         $action->requiresConfirmation();
                                //     }
                                // )
                                ->blocks([
                                    Block::make('image')
                                        ->label('Gambar')
                                        ->icon('heroicon-o-photo')
                                        ->schema([
                                            FileUpload::make('value')
                                                ->label('Gambar')
                                                ->belowContent('File berupa format gambar .jpeg .jpg .png .webp dengan latar belakang putih. Maksimal ukuran file 2MB.')
                                                ->image()
                                                ->maxSize(2048)
                                                ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                                                ->required(),
                                        ]),
                                    Block::make('video_upload')
                                        ->label('Video Upload')
                                        ->icon('heroicon-o-video-camera')
                                        ->schema([
                                            FileUpload::make('value')
                                                ->label('Video')
                                                ->belowContent('File berupa format video .mp4. Maksimal ukuran file 5MB.')
                                                ->maxSize(5000)
                                                ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_VIDEO)
                                                ->required(),
                                        ]),
                                    Block::make('video_youtube')
                                        ->label('Video YouTube')
                                        ->icon('heroicon-o-play-circle')
                                        ->schema([
                                            TextInput::make('value')
                                                ->label('URL YouTube')
                                                ->url()
                                                ->prefixIcon(Heroicon::Link)
                                                ->required(),
                                        ]),
                                ])
                        ])->columnSpan(7),
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
                            ToggleButtons::make('is_best_seller')
                                ->label('Status Best Seller')
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
                            Select::make('superiorities')
                                ->label('Keunggulan')
                                ->relationship('superiorities', 'title')
                                ->multiple()
                                ->reorderable()
                                ->preload()
                                ->searchable()
                                ->required(),
                            Select::make('features')
                                ->label('Fitur Utama')
                                ->relationship('features', 'name')
                                ->multiple()
                                ->reorderable()
                                ->preload()
                                ->searchable()
                                ->required(),
                            Builder::make('marketplace')
                                ->label('Marketplace')
                                ->blockNumbers(false)
                                ->maxItems(4)
                                ->required()
                                ->blocks([
                                    Block::make('lazada')
                                        ->label('Lazada')
                                        ->icon('heroicon-o-shopping-cart')
                                        ->maxItems(1)
                                        ->schema([
                                            TextInput::make('value')
                                                ->label('URL Produk')
                                                ->url()
                                                ->prefixIcon(Heroicon::Link)
                                                ->required(),
                                        ]),
                                    Block::make('blibli')
                                        ->label('Blibli')
                                        ->icon('heroicon-o-shopping-cart')
                                        ->maxItems(1)
                                        ->schema([
                                            TextInput::make('value')
                                                ->label('URL Produk')
                                                ->url()
                                                ->prefixIcon(Heroicon::Link)
                                                ->required(),
                                        ]),
                                    Block::make('shopee')
                                        ->label('Shopee')
                                        ->icon('heroicon-o-shopping-cart')
                                        ->maxItems(1)
                                        ->schema([
                                            TextInput::make('value')
                                                ->label('URL Produk')
                                                ->url()
                                                ->prefixIcon(Heroicon::Link)
                                                ->required(),
                                        ]),
                                    Block::make('tokopedia')
                                        ->label('Tokopedia')
                                        ->icon('heroicon-o-shopping-cart')
                                        ->maxItems(1)
                                        ->schema([
                                            TextInput::make('value')
                                                ->label('URL Produk')
                                                ->url()
                                                ->prefixIcon(Heroicon::Link)
                                                ->required(),
                                        ]),
                                ])
                        ])->columnSpan(5),
                    ])
            ]);
    }
}
