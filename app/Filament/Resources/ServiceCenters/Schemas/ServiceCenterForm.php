<?php

namespace App\Filament\Resources\ServiceCenters\Schemas;

use App\Constant\AcceptedFileConstant;
use App\Models\Product\ProductCategory;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ServiceCenterForm
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
                                ->label('Foto Tempat Service Center / Mitra')
                                ->collection('service_centers')
                                ->image()
                                ->maxSize(2048)
                                ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                                ->columnSpanFull()
                                ->belowContent('File berupa format gambar .jpeg .jpg .png .webp. Maksimal ukuran file 2MB.'),
                            Select::make('type')
                                ->label('Tipe')
                                ->options([
                                    'service_center' => 'Service Center',
                                    'partner' => 'Mitra',
                                ])
                                ->columnSpanFull()
                                ->required(),
                            TextInput::make('name')
                                ->label('Nama Service Center / Mitra')
                                ->autocomplete(false)
                                ->columnSpanFull()
                                ->required(),
                            TextInput::make('area')
                                ->label('Wilayah/Area')
                                ->autocomplete(false)
                                ->columnSpanFull()
                                ->belowContent('Contoh: Jakarta, Bandung, Surabaya')
                                ->required(),
                            Textarea::make('address')
                                ->label('Alamat')
                                ->rows(3)
                                ->required(),
                            Repeater::make('operational')
                                ->label('Jam Operasional')
                                ->columnSpanFull()
                                ->reorderableWithButtons()
                                ->minItems(1)
                                ->required()
                                ->schema([
                                    Flex::make([
                                        Select::make('from_day')
                                            ->label('Hari (From)')
                                            ->prefix('Dari')
                                            ->options([
                                                'Senin' => 'Senin',
                                                'Selasa' => 'Selasa',
                                                'Rabu' => 'Rabu',
                                                'Kamis' => 'Kamis',
                                                'Jumat' => 'Jumat',
                                                'Sabtu' => 'Sabtu',
                                                'Minggu' => 'Minggu',
                                            ])
                                            ->columnSpan(1)
                                            ->required(),
                                        Select::make('to_day')
                                            ->label('Hari (To)')
                                            ->prefix('Sampai')
                                            ->options([
                                                'Senin' => 'Senin',
                                                'Selasa' => 'Selasa',
                                                'Rabu' => 'Rabu',
                                                'Kamis' => 'Kamis',
                                                'Jumat' => 'Jumat',
                                                'Sabtu' => 'Sabtu',
                                                'Minggu' => 'Minggu',
                                            ])
                                            ->columnSpan(1)
                                            ->required(),
                                    ]),
                                    Flex::make([
                                        TimePicker::make('from_hour')
                                            ->label('Jam (From)')
                                            ->prefix('Dari')
                                            ->seconds(false)
                                            ->columnSpan(1)
                                            ->required(),
                                        TimePicker::make('to_hour')
                                            ->label('Jam (To)')
                                            ->prefix('Sampai')
                                            ->seconds(false)
                                            ->columnSpan(1)
                                            ->required(),
                                        Select::make('timezone')
                                            ->label('Zona Waktu')
                                            ->options([
                                                'WIB' => 'WIB',
                                                'WITA' => 'WITA',
                                                'WIT' => 'WIT',
                                            ])
                                            ->default('WIB')
                                            ->selectablePlaceholder(false)
                                            ->columnSpan(1)
                                            ->required(),
                                    ])
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
                            Select::make('provide_service')
                                ->label('Produk Perbaikan')
                                ->options(ProductCategory::all()->pluck('name', 'name'))
                                ->multiple()
                                ->reorderable()
                                ->preload()
                                ->required(),
                            Select::make('provide_sell')
                                ->label('Produk Penjualan')
                                ->options(ProductCategory::all()->pluck('name', 'name'))
                                ->multiple()
                                ->reorderable()
                                ->preload(),
                            TextInput::make('phone')
                                ->label('Nomor Telepon')
                                ->autocomplete(false)
                                ->columnSpanFull()
                                ->prefixIcon(Heroicon::Phone)
                                ->required(),
                            TextInput::make('whatsapp')
                                ->label('Nomor WhatsApp')
                                ->autocomplete(false)
                                ->columnSpanFull()
                                ->prefixIcon(Heroicon::Phone)
                                ->required(),
                            TextInput::make('maps')
                                ->label('Embed Maps')
                                ->autocomplete(false)
                                ->columnSpanFull()
                                ->prefixIcon(Heroicon::Map)
                                ->required(),
                        ])->columnSpan(5),
                    ]),
            ]);
    }
}
