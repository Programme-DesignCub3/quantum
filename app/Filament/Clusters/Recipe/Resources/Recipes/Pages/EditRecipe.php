<?php

namespace App\Filament\Clusters\Recipe\Resources\Recipes\Pages;

use App\Filament\Clusters\Recipe\Resources\Recipes\RecipeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditRecipe extends EditRecord
{
    protected static string $resource = RecipeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $model, array $data): Model
    {
        $model->update($data);

        $model->getFirstMedia('recipes')?->setCustomProperty('caption', $data['primary_image_caption']);
        $model->getFirstMedia('recipes')?->setCustomProperty('alt_text', $data['primary_image_alt_text']);
        $model->getFirstMedia('recipes')?->save();

        return $model;
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $id = $data['id'] ?? null;

        $findRecipe = RecipeResource::getModel()::with('media')->find($id);
        if (!$findRecipe) {
            return $data;
        }

        $data['primary_image_caption'] = $findRecipe->getFirstMedia('recipes')?->getCustomProperty('caption');
        $data['primary_image_alt_text'] = $findRecipe->getFirstMedia('recipes')?->getCustomProperty('alt_text');

        return $data;
    }
}
