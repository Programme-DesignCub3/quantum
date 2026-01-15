<?php

namespace App\Filament\Clusters\Recipe\Resources\Recipes;

use App\Filament\Clusters\Recipe\RecipeCluster;
use App\Filament\Clusters\Recipe\Resources\Recipes\Pages\CreateRecipe;
use App\Filament\Clusters\Recipe\Resources\Recipes\Pages\EditRecipe;
use App\Filament\Clusters\Recipe\Resources\Recipes\Pages\ListRecipes;
use App\Filament\Clusters\Recipe\Resources\Recipes\Schemas\RecipeForm;
use App\Filament\Clusters\Recipe\Resources\Recipes\Tables\RecipesTable;
use App\Models\Recipe\Recipe;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RecipeResource extends Resource
{
    protected static string | UnitEnum | null $navigationGroup = 'Manajemen Resep';

    protected static ?int $navigationSort = 1;

    protected static ?string $modelLabel = 'Resep';

    protected static ?string $model = Recipe::class;

    protected static ?string $cluster = RecipeCluster::class;

    public static function form(Schema $schema): Schema
    {
        return RecipeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RecipesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRecipes::route('/'),
            'create' => CreateRecipe::route('/create'),
            'edit' => EditRecipe::route('/{record}/edit'),
        ];
    }
}
