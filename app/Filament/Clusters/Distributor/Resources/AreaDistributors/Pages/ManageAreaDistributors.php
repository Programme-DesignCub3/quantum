<?php

namespace App\Filament\Clusters\Distributor\Resources\AreaDistributors\Pages;

use App\Filament\Clusters\Distributor\Resources\AreaDistributors\AreaDistributorResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageAreaDistributors extends ManageRecords
{
    protected static string $resource = AreaDistributorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
