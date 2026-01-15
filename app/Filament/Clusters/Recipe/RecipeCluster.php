<?php

namespace App\Filament\Clusters\Recipe;

use BackedEnum;
use Filament\Clusters\Cluster;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class RecipeCluster extends Cluster
{
    protected static ?int $navigationSort = 3;

    protected static string | UnitEnum | null $navigationGroup = 'Data';

    protected static ?string $navigationLabel = 'Resep';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBookOpen;

    protected static ?string $clusterBreadcrumb = 'Manajemen Resep';
}
