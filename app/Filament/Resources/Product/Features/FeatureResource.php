<?php

namespace App\Filament\Resources\Product\Features;

use App\Constant\AcceptedFileConstant;
use App\Enum\NavigationGroup;
use App\Filament\Resources\Product\Features\Pages\ManageFeatures;
use App\Models\Product\Feature;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class FeatureResource extends Resource
{
    protected static string | UnitEnum | null $navigationGroup = NavigationGroup::Product;

    protected static ?int $navigationSort = 6;

    protected static ?string $modelLabel = 'Fitur';

    protected static ?string $model = Feature::class;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                SpatieMediaLibraryFileUpload::make('feature_image')
                    ->label('Gambar')
                    ->belowContent('File berupa format gambar .jpeg .jpg .png .webp. Maksimal ukuran file 2MB.')
                    ->image()
                    ->maxSize(2048)
                    ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                    ->collection('feature_image')
                    ->columnSpanFull()
                    ->required(),
                TextInput::make('name')
                    ->label('Nama Fitur')
                    ->autocomplete(false)
                    ->columnSpanFull()
                    ->required(),
                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('feature_image')
                    ->label('Gambar')
                    ->collection('feature_image')
                    ->imageSize(100)
                    ->defaultImageUrl(asset('icons/default-image-green.svg')),
                TextColumn::make('name')
                    ->label('Nama Fitur')
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
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageFeatures::route('/'),
        ];
    }
}
