<?php

namespace App\Filament\Clusters\Product;

use BackedEnum;
use Filament\Clusters\Cluster;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class ProductCluster extends Cluster
{
    protected static ?int $navigationSort = 1;

    protected static string | UnitEnum | null $navigationGroup = 'Data';

    protected static ?string $navigationLabel = 'Produk';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedShoppingBag;

    protected static ?string $clusterBreadcrumb = 'Manajemen Produk';
}
