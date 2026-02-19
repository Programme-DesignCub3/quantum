<?php

namespace App\Filament\Clusters\NewsEvent\Resources\NewsEvents\Pages;

use App\Filament\Clusters\NewsEvent\Resources\NewsEvents\NewsEventResource;
use Filament\Forms\Components\RichEditor\RichContentRenderer;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateNewsEvent extends CreateRecord
{
    protected static string $resource = NewsEventResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
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
