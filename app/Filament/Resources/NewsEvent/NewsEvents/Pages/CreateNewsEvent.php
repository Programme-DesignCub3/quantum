<?php

namespace App\Filament\Resources\NewsEvent\NewsEvents\Pages;

use App\Filament\Resources\NewsEvent\NewsEvents\NewsEventResource;
use Filament\Resources\Pages\CreateRecord;

class CreateNewsEvent extends CreateRecord
{
    protected static string $resource = NewsEventResource::class;
}
