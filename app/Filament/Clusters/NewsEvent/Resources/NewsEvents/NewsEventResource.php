<?php

namespace App\Filament\Clusters\NewsEvent\Resources\NewsEvents;

use App\Filament\Clusters\NewsEvent\NewsEventCluster;
use App\Filament\Clusters\NewsEvent\Resources\NewsEvents\Pages\CreateNewsEvent;
use App\Filament\Clusters\NewsEvent\Resources\NewsEvents\Pages\EditNewsEvent;
use App\Filament\Clusters\NewsEvent\Resources\NewsEvents\Pages\ListNewsEvents;
use App\Filament\Clusters\NewsEvent\Resources\NewsEvents\Schemas\NewsEventForm;
use App\Filament\Clusters\NewsEvent\Resources\NewsEvents\Tables\NewsEventsTable;
use App\Models\NewsEvent\NewsEvent;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class NewsEventResource extends Resource
{
    protected static string | UnitEnum | null $navigationGroup = 'Manajemen Berita dan Event';

    protected static ?int $navigationSort = 1;

    protected static ?string $modelLabel = 'Berita & Event';

    protected static ?string $model = NewsEvent::class;

    protected static ?string $cluster = NewsEventCluster::class;

    public static function form(Schema $schema): Schema
    {
        return NewsEventForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NewsEventsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListNewsEvents::route('/'),
            'create' => CreateNewsEvent::route('/create'),
            'edit' => EditNewsEvent::route('/{record}/edit'),
        ];
    }
}
