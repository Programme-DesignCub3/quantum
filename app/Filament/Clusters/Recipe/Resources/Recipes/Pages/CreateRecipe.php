<?php

namespace App\Filament\Clusters\Recipe\Resources\Recipes\Pages;

use App\Filament\Clusters\Recipe\Resources\Recipes\RecipeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateRecipe extends CreateRecord
{
    protected static string $resource = RecipeResource::class;
}
