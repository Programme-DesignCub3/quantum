<?php

namespace App\Filament\Resources\Guidances\Pages;

use App\Filament\Resources\Guidances\GuidanceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGuidances extends ListRecords
{
    protected static string $resource = GuidanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
