<?php

namespace App\Filament\Resources\EntryData\EntrySubscriptions\Pages;

use App\Filament\Exports\SubscriptionExporter;
use App\Filament\Resources\EntryData\EntrySubscriptions\EntrySubscriptionsResource;
use Filament\Actions\CreateAction;
use Filament\Actions\ExportAction;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Resources\Pages\ManageRecords;

class ManageEntrySubscriptions extends ManageRecords
{
    protected static string $resource = EntrySubscriptionsResource::class;

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
