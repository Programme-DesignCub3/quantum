<?php

namespace App\Filament\Clusters\NewsEvent\Resources\NewsEvents\Pages;

use App\Filament\Clusters\NewsEvent\Resources\NewsEvents\NewsEventResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateNewsEvent extends CreateRecord
{
    protected static string $resource = NewsEventResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['excerpt'] = Str::words(strip_tags($data['content']), 20, '...');

        return $data;
    }
}
