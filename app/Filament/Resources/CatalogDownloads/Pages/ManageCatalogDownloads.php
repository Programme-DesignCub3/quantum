<?php

namespace App\Filament\Resources\CatalogDownloads\Pages;

use App\Filament\Resources\CatalogDownloads\CatalogDownloadResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageCatalogDownloads extends ManageRecords
{
    protected static string $resource = CatalogDownloadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
