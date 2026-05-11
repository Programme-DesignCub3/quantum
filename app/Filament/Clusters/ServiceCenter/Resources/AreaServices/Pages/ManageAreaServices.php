<?php

namespace App\Filament\Clusters\ServiceCenter\Resources\AreaServices\Pages;

use App\Filament\Clusters\ServiceCenter\Resources\AreaServices\AreaServiceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageAreaServices extends ManageRecords
{
    protected static string $resource = AreaServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
