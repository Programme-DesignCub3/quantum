<?php

namespace App\Filament\Clusters\Product\Resources\ProductCategories\Pages;

use App\Filament\Clusters\Product\Resources\ProductCategories\ProductCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageProductCategories extends ManageRecords
{
    protected static ?string $title = 'Kategori Produk';

    protected ?string $heading = 'Kategori Produk';

    protected static string $resource = ProductCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
