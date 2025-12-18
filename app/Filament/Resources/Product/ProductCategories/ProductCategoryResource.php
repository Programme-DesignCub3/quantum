<?php

namespace App\Filament\Resources\Product\ProductCategories;

use App\Constant\AcceptedFileConstant;
use App\Enum\NavigationGroup;
use App\Filament\Resources\Product\ProductCategories\Pages\ManageProductCategories;
use App\Models\Product\ProductCategory;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class ProductCategoryResource extends Resource
{
    protected static string | UnitEnum | null $navigationGroup = NavigationGroup::Product;

    protected static ?int $navigationSort = 2;

    protected static ?string $modelLabel = 'Kategori';

    protected static ?string $model = ProductCategory::class;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Kategori')
                    ->autocomplete(false)
                    ->columnSpanFull()
                    ->required(),
                Fieldset::make('Ikon Kategori')
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('icon_white')
                            ->label('Warna Putih (#FFFFFF)')
                            ->belowContent('File berupa format gambar .jpeg .jpg .png .webp .svg dengan latar belakang transparan. Maksimal ukuran file 2MB.')
                            ->image()
                            ->maxSize(2048)
                            ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE_ICON)
                            ->collection('icon_white')
                            ->columns(1),
                        SpatieMediaLibraryFileUpload::make('icon_green')
                            ->label('Warna Hijau (#127681)')
                            ->image()
                            ->maxSize(2048)
                            ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE_ICON)
                            ->collection('icon_green')
                            ->columns(1),
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('icon_white')
                    ->label('Ikon (Putih)')
                    ->collection('icon_white')
                    ->imageSize(50)
                    ->defaultImageUrl(asset('icons/default-image-white.svg')),
                SpatieMediaLibraryImageColumn::make('icon_green')
                    ->label('Ikon (Hijau)')
                    ->collection('icon_green')
                    ->imageSize(50)
                    ->defaultImageUrl(asset('icons/default-image-green.svg')),
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
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageProductCategories::route('/'),
        ];
    }
}
