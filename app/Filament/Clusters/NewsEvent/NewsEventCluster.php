<?php

namespace App\Filament\Clusters\NewsEvent;

use BackedEnum;
use Filament\Clusters\Cluster;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class NewsEventCluster extends Cluster
{
    protected static ?int $navigationSort = 2;

    protected static string | UnitEnum | null $navigationGroup = 'Data';

    protected static ?string $navigationLabel = 'Berita & Event';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedNewspaper;

    protected static ?string $clusterBreadcrumb = 'Manajemen Berita dan Event';
}
