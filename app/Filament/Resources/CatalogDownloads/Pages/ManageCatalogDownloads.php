<?php

namespace App\Filament\Resources\CatalogDownloads\Pages;

use App\Filament\Exports\CatalogDownloadExporter;
use App\Filament\Resources\CatalogDownloads\CatalogDownloadResource;
use Filament\Actions\ExportAction;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Resources\Pages\ManageRecords;

class ManageCatalogDownloads extends ManageRecords
{
    protected static string $resource = CatalogDownloadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ExportAction::make()
                ->label('Ekspor Excel')
                ->exporter(CatalogDownloadExporter::class)
                ->formats([
                    ExportFormat::Xlsx
                ])
                ->color('success')
        ];
    }
}
