<?php

namespace App\Filament\Resources\TutorialVideos\Pages;

use App\Filament\Resources\TutorialVideos\TutorialVideoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageTutorialVideos extends ManageRecords
{
    protected static string $resource = TutorialVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->mutateDataUsing(function (array $data): array {
                    if(isset($data['video'][0]['type']) && $data['video'][0]['type'] === 'youtube') {
                        preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $data['video'][0]['data']['value_url'], $matches);
                        if (isset($matches[1])) {
                            $data['video'][0]['data']['value'] = $matches[1];
                        } else {
                            $data['video'][0]['data']['value'] = '';
                        }
                    }

                    return $data;
                }),
        ];
    }
}
