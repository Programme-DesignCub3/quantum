<?php

namespace App\Filament\Resources\Product\Products;

use App\Enum\NavigationGroup;
use App\Filament\Resources\Product\Products\Pages\CreateProduct;
use App\Filament\Resources\Product\Products\Pages\EditProduct;
use App\Filament\Resources\Product\Products\Pages\ListProducts;
use App\Filament\Resources\Product\Products\Schemas\ProductForm;
use App\Filament\Resources\Product\Products\Tables\ProductsTable;
use App\Models\Product\Product;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class ProductResource extends Resource
{
    protected static string | UnitEnum | null $navigationGroup = NavigationGroup::Product;

    protected static ?int $navigationSort = 1;

    protected static ?string $modelLabel = 'Produk';

    protected static ?string $model = Product::class;

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
