<?php

namespace App\Filament\Clusters\ServiceCenter\Resources\AreaServices;

use App\Filament\Clusters\ServiceCenter\Resources\AreaServices\Pages\ManageAreaServices;
use App\Filament\Clusters\ServiceCenter\ServiceCenterCluster;
use App\Models\ServiceCenter\AreaService;
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

class AreaServiceResource extends Resource
{
    protected static string | UnitEnum | null $navigationGroup = 'Manajemen Service Center';

    protected static ?int $navigationSort = 3;

    protected static ?string $modelLabel = 'Area';

    protected static ?string $model = AreaService::class;

    protected static ?string $cluster = ServiceCenterCluster::class;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('area')
                    ->label('Nama Area')
                    ->unique()
                    ->autocomplete(false)
                    ->columnSpanFull()
                    ->helperText('Contoh: Jakarta, Bandung, Surabaya, dll.')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('area')
                    ->label('Nama Area')
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
                //
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageAreaServices::route('/'),
        ];
    }
}
