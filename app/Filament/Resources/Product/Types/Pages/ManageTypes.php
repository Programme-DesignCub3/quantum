<?php

namespace App\Filament\Resources\Product\Types\Pages;

use App\Filament\Resources\Product\Types\TypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageTypes extends ManageRecords
{
    protected static ?string $title = 'Tipe Produk';

    protected ?string $heading = 'Tipe Produk';

    protected static string $resource = TypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
