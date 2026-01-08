<?php

namespace App\Filament\Clusters\NewsEvent\Resources\NewsEvents\Pages;

use App\Filament\Clusters\NewsEvent\Resources\NewsEvents\NewsEventResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListNewsEvents extends ListRecords
{
    protected static string $resource = NewsEventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
