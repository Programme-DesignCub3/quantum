<?php

namespace App\Filament\Clusters\NewsEvent\Resources\NewsEvents\Pages;

use App\Filament\Clusters\NewsEvent\Resources\NewsEvents\NewsEventResource;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\RichEditor\RichContentRenderer;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class EditNewsEvent extends EditRecord
{
    protected static string $resource = NewsEventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $model, array $data): Model
    {
        $model->update($data);

        $model->getFirstMedia('news-events')?->setCustomProperty('caption', $data['primary_image_caption']);
        $model->getFirstMedia('news-events')?->setCustomProperty('alt_text', $data['primary_image_alt_text']);
        $model->getFirstMedia('news-events')?->save();

        return $model;
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $id = $data['id'] ?? null;

        $findArticle = NewsEventResource::getModel()::with('media')->find($id);
        if (!$findArticle) {
            return $data;
        }

        $data['primary_image_caption'] = $findArticle->getFirstMedia('news-events')?->getCustomProperty('caption');
        $data['primary_image_alt_text'] = $findArticle->getFirstMedia('news-events')?->getCustomProperty('alt_text');

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $excerpt = null;
        foreach ($data['content'] as $item) {
            if (isset($item['type']) && $item['type'] === 'paragraph') {
                $htmlContent = RichContentRenderer::make($item['data']['paragraph'])->toHtml();
                $excerpt .= (strip_tags($htmlContent)) ? strip_tags($htmlContent) . ' ' : '';
            }
        }
        $excerpt = Str::words(str_replace('&nbsp;', ' ', $excerpt), 20, '...');
        $data['excerpt'] = $excerpt;

        return $data;
    }
}
