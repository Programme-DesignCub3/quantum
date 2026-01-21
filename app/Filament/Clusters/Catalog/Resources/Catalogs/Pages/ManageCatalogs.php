<?php

namespace App\Filament\Clusters\Catalog\Resources\Catalogs\Pages;

use App\Filament\Clusters\Catalog\Resources\Catalogs\CatalogResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageCatalogs extends ManageRecords
{
    protected static string $resource = CatalogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
