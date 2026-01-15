<?php

namespace App\Filament\Resources\Guidances;

use App\Filament\Resources\Guidances\Pages\CreateGuidance;
use App\Filament\Resources\Guidances\Pages\EditGuidance;
use App\Filament\Resources\Guidances\Pages\ListGuidances;
use App\Filament\Resources\Guidances\Schemas\GuidanceForm;
use App\Filament\Resources\Guidances\Tables\GuidancesTable;
use App\Models\Guidance;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class GuidanceResource extends Resource
{
    protected static ?int $navigationSort = 4;

    protected static string | UnitEnum | null $navigationGroup = 'Data';

    protected static ?string $navigationLabel = 'Edukasi & Panduan';

    protected static ?string $modelLabel = 'Edukasi & Panduan';

    protected static ?string $model = Guidance::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedAcademicCap;

    public static function form(Schema $schema): Schema
    {
        return GuidanceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GuidancesTable::configure($table);
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
            'index' => ListGuidances::route('/'),
            'create' => CreateGuidance::route('/create'),
            'edit' => EditGuidance::route('/{record}/edit'),
        ];
    }
}
