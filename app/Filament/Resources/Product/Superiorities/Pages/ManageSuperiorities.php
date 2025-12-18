<?php

namespace App\Filament\Resources\Product\Superiorities\Pages;

use App\Filament\Resources\Product\Superiorities\SuperiorityResource;
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
