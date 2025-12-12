<?php

namespace App\Filament\Resources\Product\Variants\Pages;

use App\Filament\Resources\Product\Variants\VariantResource;
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
