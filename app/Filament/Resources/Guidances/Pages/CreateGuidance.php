<?php

namespace App\Filament\Resources\Guidances\Pages;

use App\Filament\Resources\Guidances\GuidanceResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateGuidance extends CreateRecord
{
    protected static string $resource = GuidanceResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
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
}
