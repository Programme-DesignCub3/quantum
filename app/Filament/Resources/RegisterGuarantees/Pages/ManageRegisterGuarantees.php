<?php

namespace App\Filament\Resources\RegisterGuarantees\Pages;

use App\Filament\Resources\RegisterGuarantees\RegisterGuaranteeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageRegisterGuarantees extends ManageRecords
{
    protected static string $resource = RegisterGuaranteeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
