<?php

namespace App\Filament\Clusters\Distributor\Resources\AreaDistributors;

use App\Filament\Clusters\Distributor\DistributorCluster;
use App\Filament\Clusters\Distributor\Resources\AreaDistributors\Pages\ManageAreaDistributors;
use App\Models\Distributor\AreaDistributor;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class AreaDistributorResource extends Resource
{
    protected static string | UnitEnum | null $navigationGroup = 'Manajemen Distributor';

    protected static ?int $navigationSort = 2;

    protected static ?string $modelLabel = 'Area';

    protected static ?string $model = AreaDistributor::class;

    protected static ?string $cluster = DistributorCluster::class;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('area')
                    ->label('Nama Area Distributor')
                    ->autocomplete(false)
                    ->columnSpanFull()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('area')
                    ->label('Nama Area Distributor')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageAreaDistributors::route('/'),
        ];
    }
}
