<?php

namespace App\Filament\Resources\EntryData\EntryRecipePremium\Pages;

use App\Filament\Exports\PremiumMemberExporter;
use App\Filament\Resources\EntryData\EntryRecipePremium\EntryRecipePremiumResource;
use Filament\Actions\CreateAction;
use Filament\Actions\ExportAction;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Resources\Pages\ManageRecords;

class ManageEntryRecipePremium extends ManageRecords
{
    protected static string $resource = EntryRecipePremiumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ExportAction::make()
                ->label('Ekspor Excel')
                ->exporter(PremiumMemberExporter::class)
                ->formats([
                    ExportFormat::Xlsx
                ])
                ->color('success')
        ];
    }
}
