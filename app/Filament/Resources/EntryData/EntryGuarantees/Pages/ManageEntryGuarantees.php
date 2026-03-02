<?php

namespace App\Filament\Resources\EntryData\EntryGuarantees\Pages;

use App\Filament\Exports\RegisterGuaranteeExporter;
use App\Filament\Resources\EntryData\EntryGuarantees\EntryGuaranteeResource;
use Filament\Actions\CreateAction;
use Filament\Actions\ExportAction;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Resources\Pages\ManageRecords;

class ManageEntryGuarantees extends ManageRecords
{
    protected static string $resource = EntryGuaranteeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ExportAction::make()
                ->label('Ekspor Excel')
                ->exporter(RegisterGuaranteeExporter::class)
                ->formats([
                    ExportFormat::Xlsx
                ])
                ->color('success')
        ];
    }
}
