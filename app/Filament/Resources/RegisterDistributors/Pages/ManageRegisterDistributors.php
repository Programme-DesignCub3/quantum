<?php

namespace App\Filament\Resources\RegisterDistributors\Pages;

use App\Filament\Exports\RegisterDistributorExporter;
use App\Filament\Resources\RegisterDistributors\RegisterDistributorResource;
use Filament\Actions\ExportAction;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Resources\Pages\ManageRecords;

class ManageRegisterDistributors extends ManageRecords
{
    protected static string $resource = RegisterDistributorResource::class;

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
