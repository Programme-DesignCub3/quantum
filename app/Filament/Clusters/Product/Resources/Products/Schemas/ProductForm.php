<?php

namespace App\Filament\Clusters\Product\Resources\Products\Schemas;

use App\Constant\AcceptedFileConstant;
use App\Models\Product\Product;
use App\Models\Product\Type;
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
                                ->appendFiles()
                                ->maxSize(2048)
                                ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                                ->columnSpanFull()
                                ->belowContent('File berupa format gambar .jpeg .jpg .png .webp dengan latar belakang putih. Direkomendasikan berukuran rasio 6:5. Maksimal ukuran file 2MB. Bisa mengunggah lebih dari satu gambar.')
                                ->panelLayout('grid')
                                ->required(),
                            Flex::make([
                                Select::make('product_category_id')
                                    ->label('Kategori Produk')
                                    ->relationship('category', 'name')
                                    ->preload()
                                    ->reactive()
                                    ->afterStateUpdated(function(Set $set) {
                                        $set('variant_id', null);
                                        $set('specs', []);
                                    })
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
                                    ->live()
                                    ->belowContent(fn (Get $get) => blank($get('product_category_id')) ? 'Pilih kategori produk terlebih dahulu.' : null)
                                    ->required(),
                            ]),
                            TextInput::make('name')
                                ->label('Nama Produk')
                                ->autocomplete(false)
                                ->belowContent('Contoh: QGC - 101 A')
                                ->columnSpanFull()
                                ->required(),
                            // TextInput::make('price')
                            //     ->label('Harga Produk')
                            //     ->prefix('Rp')
                            //     ->mask(RawJs::make('$money($input)'))
                            //     ->stripCharacters('.')
                            //     ->autocomplete(false)
                            //     ->columnSpanFull()
                            //     ->required(),
                            Builder::make('specs')
                                ->label('Spesifikasi')
                                ->blockNumbers(false)
                                ->reorderable(false)
                                ->maxItems(4)
                                ->belowLabel(fn (Get $get) => blank($get('product_category_id')) ? 'Pilih kategori produk terlebih dahulu.' : null)
                                ->disabled(fn(Get $get) => blank($get('product_category_id')))
                                ->blocks([
                                    Block::make('furnace_type')
                                        ->label('Tungku')
                                        ->icon('heroicon-o-lifebuoy')
                                        ->maxItems(1)
                                        ->schema([
                                            Select::make('types')
                                                ->label('Tungku')
                                                ->disabled(fn(Get $get) => blank($get('../../../product_category_id')))
                                                ->relationship(
                                                    name: 'types',
                                                    titleAttribute: 'name',
                                                    modifyQueryUsing: fn($query, Get $get) => $query->where('product_category_id', $get('../../../product_category_id'))
                                                )
                                                ->preload()
                                                ->prefixIcon(Heroicon::Lifebuoy)
                                                ->searchable()
                                                ->required()
                                        ]),
                                    Block::make('power_type')
                                        ->label('Power')
                                        ->icon('heroicon-o-power')
                                        ->maxItems(1)
                                        ->schema([
                                            Select::make('types')
                                                ->label('Power')
                                                ->disabled(fn(Get $get) => blank($get('../../../product_category_id')))
                                                ->relationship(
                                                    name: 'types',
                                                    titleAttribute: 'name',
                                                    modifyQueryUsing: fn($query, Get $get) => $query->where('product_category_id', $get('../../../product_category_id'))
                                                )
                                                ->preload()
                                                ->prefixIcon(Heroicon::Power)
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
                                                ->disabled(fn(Get $get) => blank($get('../../../product_category_id')))
                                                ->relationship(
                                                    name: 'types',
                                                    titleAttribute: 'name',
                                                    modifyQueryUsing: fn($query, Get $get) => $query->where('product_category_id', $get('../../../product_category_id'))
                                                )
                                                ->preload()
                                                ->prefixIcon(Heroicon::Fire)
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
                                                ->disabled(fn(Get $get) => blank($get('../../../product_category_id')))
                                                ->relationship(
                                                    name: 'types',
                                                    titleAttribute: 'name',
                                                    modifyQueryUsing: fn($query, Get $get) => $query->where('product_category_id', $get('../../../product_category_id'))
                                                )
                                                ->preload()
                                                ->prefixIcon(Heroicon::ArrowLongRight)
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
                                ->reorderableWithButtons()
                                ->blockNumbers(false)
                                ->blocks([
                                    Block::make('image')
                                        ->label('Gambar')
                                        ->icon('heroicon-o-photo')
                                        ->schema([
                                            FileUpload::make('value')
                                                ->label('Gambar')
                                                ->belowContent('File berupa format gambar .jpeg .jpg .png .webp Maksimal ukuran file 2MB.')
                                                ->image()
                                                ->maxFiles(1)
                                                ->maxSize(2048)
                                                ->directory('product-gallery')
                                                ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                                                ->required(),
                                        ]),
                                    Block::make('video_upload')
                                        ->label('Video Upload')
                                        ->icon('heroicon-o-video-camera')
                                        ->schema([
                                            FileUpload::make('thumbnail')
                                                ->label('Thumbnail Video')
                                                ->belowContent('File berupa format gambar .jpeg .jpg .png .webp Maksimal ukuran file 2MB.')
                                                ->image()
                                                ->maxFiles(1)
                                                ->maxSize(2048)
                                                ->directory('product-gallery')
                                                ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                                                ->required(),
                                            FileUpload::make('value')
                                                ->label('Video')
                                                ->belowContent('File berupa format video .mp4. Maksimal ukuran file 12MB.')
                                                ->maxFiles(1)
                                                ->maxSize(12288)
                                                ->directory('product-gallery')
                                                ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_VIDEO)
                                                ->required(),
                                        ]),
                                    Block::make('video_youtube')
                                        ->label('Video YouTube')
                                        ->icon('heroicon-o-play-circle')
                                        ->schema([
                                            FileUpload::make('thumbnail')
                                                ->label('Thumbnail Video')
                                                ->belowContent('File berupa format gambar .jpeg .jpg .png .webp Maksimal ukuran file 2MB.')
                                                ->image()
                                                ->maxFiles(1)
                                                ->maxSize(2048)
                                                ->directory('product-gallery')
                                                ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                                                ->required(),
                                            TextInput::make('value')
                                                ->label('URL YouTube')
                                                ->url()
                                                ->prefixIcon(Heroicon::Link)
                                                ->required(),
                                            Hidden::make('video_id'),
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
                                ]),
                            Section::make('Katalog')
                                ->description('Ditampilkan di halaman Katalog.')
                                ->schema([
                                    SpatieMediaLibraryFileUpload::make('thumbnail_catalog')
                                        ->label('Thumbnail Katalog')
                                        ->collection('thumbnail_catalog')
                                        ->image()
                                        ->maxSize(2048)
                                        ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                                        ->columnSpanFull()
                                        ->belowContent('File berupa format gambar .jpeg .jpg .png .webp. Maksimal ukuran file 2MB.'),
                                    SpatieMediaLibraryFileUpload::make('catalog_product')
                                        ->label('Katalog Produk')
                                        ->collection('catalog_product')
                                        ->maxSize(5120)
                                        ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_DOCUMENT)
                                        ->columnSpanFull()
                                        ->belowContent('File berupa format dokumen .pdf. Maksimal ukuran file 5MB.'),
                                ]),
                            Section::make('Edukasi dan Panduan')
                                ->description('Ditampilkan di halaman Produk dan Edukasi/Panduan.')
                                ->schema([
                                    SpatieMediaLibraryFileUpload::make('thumbnail_guidance')
                                        ->label('Thumbnail Panduan')
                                        ->collection('thumbnail_guidance')
                                        ->image()
                                        ->maxSize(2048)
                                        ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                                        ->columnSpanFull()
                                        ->belowContent('File berupa format gambar .jpeg .jpg .png .webp. Maksimal ukuran file 2MB.'),
                                    SpatieMediaLibraryFileUpload::make('guidance_product')
                                        ->label('Panduan Produk')
                                        ->collection('guidance_product')
                                        ->maxSize(5120)
                                        ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_DOCUMENT)
                                        ->columnSpanFull()
                                        ->belowContent('File berupa format dokumen .pdf. Maksimal ukuran file 5MB.'),
                                ]),
                        ])->columnSpan(5),
                    ])
            ]);
    }
}
