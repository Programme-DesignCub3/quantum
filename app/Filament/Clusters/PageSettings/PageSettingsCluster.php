<?php

namespace App\Filament\Clusters\PageSettings;

use BackedEnum;
use Filament\Clusters\Cluster;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class PageSettingsCluster extends Cluster
{
    protected static ?int $navigationSort = 2;

    protected static string | UnitEnum | null $navigationGroup = 'Pengaturan';

    protected static ?string $navigationLabel = 'Halaman';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static ?string $clusterBreadcrumb = 'Pengaturan Halaman';
}
