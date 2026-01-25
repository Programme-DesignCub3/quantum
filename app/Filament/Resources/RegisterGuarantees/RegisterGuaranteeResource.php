<?php

namespace App\Filament\Resources\RegisterGuarantees;

use App\Filament\Resources\RegisterGuarantees\Pages\ManageRegisterGuarantees;
use App\Models\RegisterGuarantee;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RegisterGuaranteeResource extends Resource
{
    protected static ?int $navigationSort = 4;

    protected static string | UnitEnum | null $navigationGroup = 'Entri Data';

    protected static ?string $navigationLabel = 'Pendaftaran Garansi';

    protected static ?string $modelLabel = 'Pendaftaran Garansi';

    protected static ?string $model = RegisterGuarantee::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageRegisterGuarantees::route('/'),
        ];
    }
}
