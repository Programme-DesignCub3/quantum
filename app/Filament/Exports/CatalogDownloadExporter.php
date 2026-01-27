<?php

namespace App\Filament\Exports;

use App\Models\CatalogDownload;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class CatalogDownloadExporter extends Exporter
{
    protected static ?string $model = CatalogDownload::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('name')
                ->label('Nama'),
            ExportColumn::make('email')
                ->label('Email'),
            ExportColumn::make('whatsapp')
                ->label('WhatsApp'),
            ExportColumn::make('created_at')
                ->label('Tanggal Unduh'),
            ExportColumn::make('downloaded_catalogs')
                ->label('Katalog yang diunduh')
                ->listAsJson(),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your catalog download export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
