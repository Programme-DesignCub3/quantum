<?php

namespace App\Filament\Clusters\Product\Resources\Variants;

use App\Filament\Clusters\Product\ProductCluster;
use App\Filament\Clusters\Product\Resources\Variants\Pages\ManageVariants;
use App\Models\Product\Variant;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use UnitEnum;

class VariantResource extends Resource
{
    protected static string | UnitEnum | null $navigationGroup = 'Manajemen Produk';

    protected static ?int $navigationSort = 3;

    protected static ?string $modelLabel = 'Jenis';

    protected static ?string $model = Variant::class;

    protected static ?string $cluster = ProductCluster::class;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('product_category_id')
                    ->label('Kategori')
                    ->relationship('productCategory', 'name')
                    ->preload()
                    ->columnSpanFull()
                    ->required(),
                TextInput::make('name')
                    ->label('Nama Jenis Produk')
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
                    ->label('Nama Jenis Produk')
                    ->searchable(),
                TextColumn::make('productCategory.name')
                    ->label('Kategori')
                    ->placeholder('Tidak ada kategori')
                    ->badge()
                    ->color('gray')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('product_category_id')
                    ->label('Kategori')
                    ->relationship('productCategory', 'name')
                    ->preload(),
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
            'index' => ManageVariants::route('/'),
        ];
    }
}
