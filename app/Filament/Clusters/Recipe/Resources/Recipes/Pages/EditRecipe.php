<?php

namespace App\Filament\Clusters\Recipe\Resources\Recipes\Pages;

use App\Filament\Clusters\Recipe\Resources\Recipes\RecipeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRecipe extends EditRecord
{
    protected static string $resource = RecipeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
