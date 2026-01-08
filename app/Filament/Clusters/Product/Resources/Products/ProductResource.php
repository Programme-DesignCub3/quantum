<?php

namespace App\Filament\Clusters\Product\Resources\Products;

use App\Filament\Clusters\Product\ProductCluster;
use App\Filament\Clusters\Product\Resources\Products\Pages\CreateProduct;
use App\Filament\Clusters\Product\Resources\Products\Pages\EditProduct;
use App\Filament\Clusters\Product\Resources\Products\Pages\ListProducts;
use App\Filament\Clusters\Product\Resources\Products\Schemas\ProductForm;
use App\Filament\Clusters\Product\Resources\Products\Tables\ProductsTable;
use App\Models\Product\Product;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class ProductResource extends Resource
{
    protected static string | UnitEnum | null $navigationGroup = 'Manajemen Produk';

    protected static ?int $navigationSort = 1;

    protected static ?string $modelLabel = 'Produk';

    protected static ?string $model = Product::class;

    protected static ?string $cluster = ProductCluster::class;

    public static function form(Schema $schema): Schema
    {
        return ProductForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProductsTable::configure($table);
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
            'index' => ListProducts::route('/'),
            'create' => CreateProduct::route('/create'),
            'edit' => EditProduct::route('/{record}/edit'),
        ];
    }
}
