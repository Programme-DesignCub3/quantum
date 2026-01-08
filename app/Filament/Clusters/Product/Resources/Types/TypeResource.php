<?php

namespace App\Filament\Clusters\Product\Resources\Types;

use App\Filament\Clusters\Product\ProductCluster;
use App\Filament\Clusters\Product\Resources\Types\Pages\ManageTypes;
use App\Models\Product\Type;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class TypeResource extends Resource
{
    protected static string | UnitEnum | null $navigationGroup = 'Manajemen Produk';

    protected static ?int $navigationSort = 4;

    protected static ?string $modelLabel = 'Tipe';

    protected static ?string $model = Type::class;

    protected static ?string $cluster = ProductCluster::class;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
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
            'index' => ManageTypes::route('/'),
        ];
    }
}
