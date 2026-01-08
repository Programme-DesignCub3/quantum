<?php

namespace App\Filament\Clusters\NewsEvent\Resources\NewsEventCategories;

use App\Filament\Clusters\NewsEvent\NewsEventCluster;
use App\Filament\Clusters\NewsEvent\Resources\NewsEventCategories\Pages\ManageNewsEventCategories;
use App\Models\NewsEvent\NewsEventCategory;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class NewsEventCategoryResource extends Resource
{
    protected static string | UnitEnum | null $navigationGroup = 'Manajemen Berita dan Event';

    protected static ?int $navigationSort = 2;

    protected static ?string $modelLabel = 'Kategori';

    protected static ?string $model = NewsEventCategory::class;

    protected static ?string $cluster = NewsEventCluster::class;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Kategori')
                    ->autocomplete(false)
                    ->columnSpanFull()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Kategori')
                    ->searchable(),
                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable(),
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
            'index' => ManageNewsEventCategories::route('/'),
        ];
    }
}
