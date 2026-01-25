<?php

namespace App\Filament\Clusters\Distributor\Resources\Distributors;

use App\Filament\Clusters\Distributor\DistributorCluster;
use App\Filament\Clusters\Distributor\Resources\Distributors\Pages\CreateDistributor;
use App\Filament\Clusters\Distributor\Resources\Distributors\Pages\EditDistributor;
use App\Filament\Clusters\Distributor\Resources\Distributors\Pages\ListDistributors;
use App\Filament\Clusters\Distributor\Resources\Distributors\Schemas\DistributorForm;
use App\Filament\Clusters\Distributor\Resources\Distributors\Tables\DistributorsTable;
use App\Models\Distributor\Distributor;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class DistributorResource extends Resource
{
    protected static string | UnitEnum | null $navigationGroup = 'Manajemen Distributor';

    protected static ?int $navigationSort = 1;

    protected static ?string $modelLabel = 'Distributor';

    protected static ?string $model = Distributor::class;

    protected static ?string $cluster = DistributorCluster::class;

    public static function form(Schema $schema): Schema
    {
        return DistributorForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DistributorsTable::configure($table);
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
            'index' => ListDistributors::route('/'),
            'create' => CreateDistributor::route('/create'),
            'edit' => EditDistributor::route('/{record}/edit'),
        ];
    }
}
