<?php

namespace App\Filament\Clusters\Product\Resources\Superiorities\Pages;

use App\Filament\Clusters\Product\Resources\Superiorities\SuperiorityResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageSuperiorities extends ManageRecords
{
    protected static ?string $title = 'Keunggulan Produk';

    protected ?string $heading = 'Keunggulan Produk';

    protected static string $resource = SuperiorityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
