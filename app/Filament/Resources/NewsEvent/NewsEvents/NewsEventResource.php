<?php

namespace App\Filament\Resources\NewsEvent\NewsEvents;

use App\Enum\NavigationGroup;
use App\Filament\Resources\NewsEvent\NewsEvents\Pages\CreateNewsEvent;
use App\Filament\Resources\NewsEvent\NewsEvents\Pages\EditNewsEvent;
use App\Filament\Resources\NewsEvent\NewsEvents\Pages\ListNewsEvents;
use App\Filament\Resources\NewsEvent\NewsEvents\Schemas\NewsEventForm;
use App\Filament\Resources\NewsEvent\NewsEvents\Tables\NewsEventsTable;
use App\Models\NewsEvent\NewsEvent;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class NewsEventResource extends Resource
{
    protected static string | UnitEnum | null $navigationGroup = NavigationGroup::NewsEvent;

    protected static ?int $navigationSort = 1;

    protected static ?string $modelLabel = 'Berita & Event';

    protected static ?string $model = NewsEvent::class;

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
