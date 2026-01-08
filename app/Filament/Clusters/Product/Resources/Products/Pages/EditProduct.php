<?php

namespace App\Filament\Clusters\Product\Resources\Products\Pages;

use App\Filament\Clusters\Product\Resources\Products\ProductResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->before(function () {
                    $gallery = $this->record->gallery ?? [];

                    $files = $this->extractFilesFromBuilder($gallery);

                    foreach ($files as $file) {
                        if (Storage::disk('public')->exists($file)) {
                            Storage::disk('public')->delete($file);
                        }
                    }
                }),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if(isset($data['gallery'][0]['type']) && $data['gallery'][0]['type'] === 'video_youtube') {
            preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $data['gallery'][0]['data']['value'], $matches);
            if (isset($matches[1])) {
                $data['gallery'][0]['data']['video_id'] = $matches[1];
            } else {
                $data['gallery'][0]['data']['video_id'] = '';
            }
        }

        $oldGallery = $this->record->gallery ?? [];
        $newGallery = $data['gallery'] ?? [];

        $oldFiles = $this->extractFilesFromBuilder($oldGallery);
        $newFiles = $this->extractFilesFromBuilder($newGallery);

        $deletedFiles = $oldFiles->diff($newFiles);

        foreach ($deletedFiles as $file) {
            Storage::disk('public')->delete($file);
        }

        return $data;
    }

    protected function extractFilesFromBuilder(array $blocks)
    {
        return collect($blocks)
            ->filter(fn ($block) =>
                isset($block['type']) &&
                in_array($block['type'], ['image', 'video_upload', 'video_youtube'])
            )
            ->map(fn ($block) => $block['data']['value'] ?? null)
            ->filter()
            ->values();
    }

    protected function afterSave(): void
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
