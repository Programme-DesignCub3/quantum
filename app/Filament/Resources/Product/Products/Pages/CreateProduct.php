<?php

namespace App\Filament\Resources\Product\Products\Pages;

use App\Filament\Resources\Product\Products\ProductResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        unset($data['specs']);

        return $data;
    }

    protected function afterCreate(): void
    {
        $this->syncSpecs();
    }

    protected function afterSave(): void
    {
        $this->syncSpecs();
    }

    protected function syncSpecs(): void
    {
        $record = $this->record;

        $specs = $this->data['specs'] ?? [];

        $syncData = [];

        foreach ($specs as $spec) {
            $typeId = $spec['data']['types'] ?? null;

            if ($typeId) {
                $syncData[$typeId] = [
                    'spec_type' => $spec['type'], // optional
                ];
            }
        }

        // 🔥 INI YANG BENAR
        $record->types()->sync($syncData);
    }
}
