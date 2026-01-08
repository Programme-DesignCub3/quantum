<?php

namespace App\Filament\Clusters\NewsEvent\Resources\NewsEventCategories\Pages;

use App\Filament\Clusters\NewsEvent\Resources\NewsEventCategories\NewsEventCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageNewsEventCategories extends ManageRecords
{
    protected static ?string $title = 'Kategori Berita & Event';

    protected ?string $heading = 'Kategori Berita & Event';

    protected static string $resource = NewsEventCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
