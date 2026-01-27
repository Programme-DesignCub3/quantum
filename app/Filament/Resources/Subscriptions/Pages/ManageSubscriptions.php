<?php

namespace App\Filament\Resources\Subscriptions\Pages;

use App\Filament\Exports\SubscriptionExporter;
use App\Filament\Resources\Subscriptions\SubscriptionResource;
use Filament\Actions\ExportAction;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Resources\Pages\ManageRecords;

class ManageSubscriptions extends ManageRecords
{
    protected static string $resource = SubscriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ExportAction::make()
                ->label('Ekspor Excel')
                ->exporter(SubscriptionExporter::class)
                ->formats([
                    ExportFormat::Xlsx
                ])
                ->color('success')
        ];
    }
}
