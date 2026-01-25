<?php

namespace App\Filament\Clusters\Distributor\Resources\Distributors\Pages;

use App\Filament\Clusters\Distributor\Resources\Distributors\DistributorResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDistributor extends EditRecord
{
    protected static string $resource = DistributorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
