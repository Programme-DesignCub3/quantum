<?php

namespace App\Filament\Clusters\ServiceCenter\Resources\ServiceCenters;

use App\Filament\Clusters\ServiceCenter\ServiceCenterCluster;
use App\Filament\Clusters\ServiceCenter\Resources\ServiceCenters\Pages\CreateServiceCenter;
use App\Filament\Clusters\ServiceCenter\Resources\ServiceCenters\Pages\EditServiceCenter;
use App\Filament\Clusters\ServiceCenter\Resources\ServiceCenters\Pages\ListServiceCenters;
use App\Filament\Clusters\ServiceCenter\Resources\ServiceCenters\Schemas\ServiceCenterForm;
use App\Filament\Clusters\ServiceCenter\Resources\ServiceCenters\Tables\ServiceCentersTable;
use App\Models\ServiceCenter\ServiceCenter;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ServiceCenterResource extends Resource
{
    protected static string | UnitEnum | null $navigationGroup = 'Manajemen Service Center';

    protected static ?int $navigationSort = 1;

    protected static ?string $modelLabel = 'Service Center';

    protected static ?string $model = ServiceCenter::class;

    protected static ?string $cluster = ServiceCenterCluster::class;

    public static function form(Schema $schema): Schema
    {
        return ServiceCenterForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServiceCentersTable::configure($table);
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
            'index' => ListServiceCenters::route('/'),
            'create' => CreateServiceCenter::route('/create'),
            'edit' => EditServiceCenter::route('/{record}/edit'),
        ];
    }
}
