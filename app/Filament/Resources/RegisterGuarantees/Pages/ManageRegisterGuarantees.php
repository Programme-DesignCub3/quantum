<?php

namespace App\Filament\Resources\RegisterGuarantees\Pages;

use App\Filament\Exports\RegisterGuaranteeExporter;
use App\Filament\Resources\RegisterGuarantees\RegisterGuaranteeResource;
use Filament\Actions\CreateAction;
use Filament\Actions\ExportAction;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Resources\Pages\ManageRecords;

class ManageRegisterGuarantees extends ManageRecords
{
    protected static string $resource = RegisterGuaranteeResource::class;

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
