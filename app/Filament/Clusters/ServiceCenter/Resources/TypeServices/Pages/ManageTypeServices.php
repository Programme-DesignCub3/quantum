<?php

namespace App\Filament\Clusters\ServiceCenter\Resources\TypeServices\Pages;

use App\Filament\Clusters\ServiceCenter\Resources\TypeServices\TypeServiceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageTypeServices extends ManageRecords
{
    protected static ?string $title = 'Tipe Service Center';

    protected ?string $heading = 'Tipe Service Center';

    protected static string $resource = TypeServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
