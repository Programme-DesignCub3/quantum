<?php

namespace App\Filament\Resources\Product\Products\Pages;

use App\Filament\Resources\Product\Products\ProductResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function afterCreate(): void
    {
        // Cek dulu apakah data specs masuk ke sini
        // dd($this->data['specs']);

        $typeIds = collect($this->data['specs'] ?? [])
            ->map(function ($block) {
                // Builder menyimpan data di dalam key 'data'
                return $block['data']['types'] ?? null;
            })
            ->filter()
            ->values() // Pastikan index array berurutan
            ->toArray();

        // Pastikan $this->record adalah model Product
        if ($this->record) {
            $this->record->types()->sync($typeIds);
        }
    }

    public static function afterSave(Model $record, array $data): void
    {
        self::syncSpecsToTypes($record, $data);
    }

    protected static function syncSpecsToTypes(Model $record, array $data): void
    {
        // Ambil semua type_id dari dalam array 'specs'
        $typeIds = collect($data['specs'] ?? [])
            ->pluck('data.type_id') // Sesuaikan dengan key di Select::make
            ->filter()
            ->toArray();

        // Sinkronkan ke tabel pivot
        $record->types()->sync($typeIds);
    }
}
