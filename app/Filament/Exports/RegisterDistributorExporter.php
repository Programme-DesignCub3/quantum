<?php

namespace App\Filament\Exports;

use App\Models\Distributor\RegisterDistributor;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class RegisterDistributorExporter extends Exporter
{
    protected static ?string $model = RegisterDistributor::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('name')
                ->label('Nama'),
            ExportColumn::make('email')
                ->label('Email'),
            ExportColumn::make('whatsapp')
                ->label('WhatsApp'),
            ExportColumn::make('distributed_area')
                ->label('Wilayah yang diminati'),
            ExportColumn::make('address')
                ->label('Alamat'),
            ExportColumn::make('message')
                ->label('Pesan'),
            ExportColumn::make('created_at')
                ->label('Tanggal Pendaftaran'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your register distributor export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
