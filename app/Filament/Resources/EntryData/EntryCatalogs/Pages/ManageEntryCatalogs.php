<?php

namespace App\Filament\Resources\EntryData\EntryCatalogs\Pages;

use App\Filament\Exports\CatalogDownloadExporter;
use App\Filament\Resources\EntryData\EntryCatalogs\EntryCatalogResource;
use Filament\Actions\ExportAction;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Resources\Pages\ManageRecords;

class ManageEntryCatalogs extends ManageRecords
{
    protected static string $resource = EntryCatalogResource::class;

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
