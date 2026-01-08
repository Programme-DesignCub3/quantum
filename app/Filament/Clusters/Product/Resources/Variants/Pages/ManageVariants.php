<?php

namespace App\Filament\Clusters\Product\Resources\Variants\Pages;

use App\Filament\Clusters\Product\Resources\Variants\VariantResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageVariants extends ManageRecords
{
    protected static ?string $title = 'Jenis Produk';

    protected ?string $heading = 'Jenis Produk';

    protected static string $resource = VariantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
