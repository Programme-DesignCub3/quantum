<?php

namespace App\Filament\Resources\Guidances\Pages;

use App\Filament\Resources\Guidances\GuidanceResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EditGuidance extends EditRecord
{
    protected static string $resource = GuidanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->before(function () {
                    $content = $this->record->content ?? [];

                    $files = $this->extractFilesFromBuilder($content);

                    foreach ($files as $file) {
                        foreach ($file as $item) {
                            if (Storage::disk('public')->exists($item['image'])) {
                                Storage::disk('public')->delete($item['image']);
                            }
                        }
                    }
                }),
        ];
    }

    protected function handleRecordUpdate(Model $model, array $data): Model
    {
        $model->update($data);

        $model->getFirstMedia('guidances')?->setCustomProperty('caption', $data['primary_image_caption']);
        $model->getFirstMedia('guidances')?->setCustomProperty('alt_text', $data['primary_image_alt_text']);
        $model->getFirstMedia('guidances')?->save();

        return $model;
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $id = $data['id'] ?? null;

        $findArticle = GuidanceResource::getModel()::with('media')->find($id);
        if (!$findArticle) {
            return $data;
        }

        $data['primary_image_caption'] = $findArticle->getFirstMedia('guidances')?->getCustomProperty('caption');
        $data['primary_image_alt_text'] = $findArticle->getFirstMedia('guidances')?->getCustomProperty('alt_text');

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $excerpt = null;

        for($i = 0; $i < count($data['content']); $i++) {
            if(isset($data['content'][$i]['type']) && $data['content'][$i]['type'] == 'paragraph') {
                $excerpt .= strip_tags($data['content'][$i]['data']['value']) . ' ';
            }
        }

        $data['excerpt'] = Str::words($excerpt, 20, '...');

        return $data;
    }

    protected function extractFilesFromBuilder(array $blocks)
    {
        return collect($blocks)
            ->filter(fn ($block) =>
                isset($block['type']) &&
                in_array($block['type'], ['steps'])
            )
            ->map(fn ($block) => $block['data']['value'] ?? null)
            ->filter()
            ->values();
    }
}
