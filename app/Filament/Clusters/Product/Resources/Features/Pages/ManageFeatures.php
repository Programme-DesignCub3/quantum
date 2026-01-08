<?php

namespace App\Filament\Clusters\Product\Resources\Features\Pages;

use App\Filament\Clusters\Product\Resources\Features\FeatureResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageFeatures extends ManageRecords
{
    protected static string $resource = FeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
