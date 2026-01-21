<?php

namespace App\Filament\Clusters\Catalog;

use BackedEnum;
use Filament\Clusters\Cluster;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class CatalogCluster extends Cluster
{
    protected static ?int $navigationSort = 4;

    protected static string | UnitEnum | null $navigationGroup = 'Data';

    protected static ?string $navigationLabel = 'Katalog';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSquares2x2;

    protected static ?string $clusterBreadcrumb = 'Manajemen Katalog';
}
