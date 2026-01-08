<?php

namespace App\Filament\Clusters\Product\Resources\Products\Pages;

use App\Filament\Clusters\Product\Resources\Products\ProductResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if(isset($data['gallery'][0]['type']) && $data['gallery'][0]['type'] === 'video_youtube') {
            preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $data['gallery'][0]['data']['value'], $matches);
            if (isset($matches[1])) {
                $data['gallery'][0]['data']['video_id'] = $matches[1];
            } else {
                $data['gallery'][0]['data']['video_id'] = '';
            }
        }

        return $data;
    }

    protected function afterCreate(): void
    {
        $typeIds = collect($this->data['specs'] ?? [])
            ->map(function ($block) {
                return $block['data']['types'] ?? null;
            })
            ->filter()
            ->values()
            ->toArray();

        if ($this->record) {
            $this->record->types()->sync($typeIds);
        }
    }
}
