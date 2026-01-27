<?php

namespace App\Filament\Exports;

use App\Models\RegisterGuarantee;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class RegisterGuaranteeExporter extends Exporter
{
    protected static ?string $model = RegisterGuarantee::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('name')
                ->label('Nama Lengkap'),
            ExportColumn::make('phone')
                ->label('Nomor Handphone'),
            ExportColumn::make('email')
                ->label('Email'),
            ExportColumn::make('address')
                ->label('Alamat Lengkap'),
            ExportColumn::make('product_serial_number')
                ->label('Nomor Seri Produk'),
            ExportColumn::make('product_category')
                ->label('Kategori Produk'),
            ExportColumn::make('product_model')
                ->label('Model Produk'),
            ExportColumn::make('purchase_date')
                ->label('Tanggal Pembelian'),
            ExportColumn::make('purchase_place')
                ->label('Tempat Pembelian'),
            ExportColumn::make('message')
                ->label('Pesan'),
            ExportColumn::make('created_at')
                ->label('Tanggal Pendaftaran'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your register guarantee export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
