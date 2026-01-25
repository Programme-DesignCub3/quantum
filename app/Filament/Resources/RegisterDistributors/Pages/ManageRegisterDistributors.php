<?php

namespace App\Filament\Resources\RegisterDistributors\Pages;

use App\Filament\Resources\RegisterDistributors\RegisterDistributorResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageRegisterDistributors extends ManageRecords
{
    protected static string $resource = RegisterDistributorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
