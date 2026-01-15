<?php

namespace App\Filament\Clusters\NewsEvent\Resources\NewsEvents\Pages;

use App\Filament\Clusters\NewsEvent\Resources\NewsEvents\NewsEventResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
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

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['excerpt'] = Str::words(strip_tags($data['content']), 20, '...');

        return $data;
    }
}
