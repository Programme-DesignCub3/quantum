<?php

namespace App\Filament\Clusters\ServiceCenter\Resources\TypeServices;

use App\Filament\Clusters\ServiceCenter\Resources\TypeServices\Pages\ManageTypeServices;
use App\Filament\Clusters\ServiceCenter\ServiceCenterCluster;
use App\Models\ServiceCenter\TypeService;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use UnitEnum;

class TypeServiceResource extends Resource
{
    protected static string | UnitEnum | null $navigationGroup = 'Manajemen Service Center';

    protected static ?int $navigationSort = 2;

    protected static ?string $modelLabel = 'Tipe';

    protected static ?string $model = TypeService::class;

    protected static ?string $cluster = ServiceCenterCluster::class;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                ToggleButtons::make('is_active')
                    ->label('Status Aktif')
                    ->options([
                        1 => 'Aktif',
                        0 => 'Tidak Aktif',
                    ])
                    ->colors([
                        1 => 'success',
                        0 => 'warning',
                    ])
                    ->inline()
                    ->default(1)
                    ->columnSpanFull()
                    ->required(),
                TextInput::make('name')
                    ->label('Nama Tipe')
                    ->autocomplete(false)
                    ->columnSpanFull()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Tipe')
                    ->searchable(),
                ToggleColumn::make('is_active')
                    ->label('Status Aktif')
                    ->sortable(),
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
            'index' => ManageTypeServices::route('/'),
        ];
    }
}
