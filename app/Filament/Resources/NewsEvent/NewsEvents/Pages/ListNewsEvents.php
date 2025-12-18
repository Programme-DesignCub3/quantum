<?php

namespace App\Filament\Resources\NewsEvent\NewsEvents\Pages;

use App\Filament\Resources\NewsEvent\NewsEvents\NewsEventResource;
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
