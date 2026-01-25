<?php

namespace App\Filament\Clusters\Distributor;

use BackedEnum;
use Filament\Clusters\Cluster;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class DistributorCluster extends Cluster
{
    protected static ?int $navigationSort = 4;

    protected static string | UnitEnum | null $navigationGroup = 'Data';

    protected static ?string $navigationLabel = 'Distributor';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTruck;

    protected static ?string $clusterBreadcrumb = 'Manajemen Distributor';
}
