<?php

namespace App\Filament\Clusters\Recipe\Resources\Recipes\Pages;

use App\Filament\Clusters\Recipe\Resources\Recipes\RecipeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRecipes extends ListRecords
{
    protected static string $resource = RecipeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
