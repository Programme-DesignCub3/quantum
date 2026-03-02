<?php

namespace App\Filament\Resources\EntryData\EntryDistributors\Pages;

use App\Filament\Exports\RegisterDistributorExporter;
use App\Filament\Resources\EntryData\EntryDistributors\EntryDistributorResource;
use Filament\Actions\CreateAction;
use Filament\Actions\ExportAction;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Resources\Pages\ManageRecords;

class ManageEntryDistributors extends ManageRecords
{
    protected static string $resource = EntryDistributorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ExportAction::make()
                ->label('Ekspor Excel')
                ->exporter(RegisterDistributorExporter::class)
                ->formats([
                    ExportFormat::Xlsx
                ])
                ->color('success')
        ];
    }
}
