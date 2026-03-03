<?php

namespace App\Filament\Clusters\ServiceCenter;

use BackedEnum;
use Filament\Clusters\Cluster;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class ServiceCenterCluster extends Cluster
{
    protected static ?int $navigationSort = 5;

    protected static string | UnitEnum | null $navigationGroup = 'Data';

    protected static ?string $navigationLabel = 'Service Center';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedWrenchScrewdriver;

    protected static ?string $clusterBreadcrumb = 'Manajemen Service Center';
}
