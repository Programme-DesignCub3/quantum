<?php

namespace App\Filament\Resources\Product\Superiorities;

use App\Constant\AcceptedFileConstant;
use App\Enum\NavigationGroup;
use App\Filament\Resources\Product\Superiorities\Pages\ManageSuperiorities;
use App\Models\Product\Superiority;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class SuperiorityResource extends Resource
{
    protected static string | UnitEnum | null $navigationGroup = NavigationGroup::Product;

    protected static ?int $navigationSort = 5;

    protected static ?string $modelLabel = 'Keunggulan';

    protected static ?string $model = Superiority::class;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                SpatieMediaLibraryFileUpload::make('icon_green')
                    ->label('Ikon')
                    ->belowLabel('Warna Hijau (#127681)')
                    ->belowContent('File berupa format gambar .jpeg .jpg .png .webp .svg dengan latar belakang transparan. Maksimal ukuran file 2MB.')
                    ->image()
                    ->maxSize(2048)
                    ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE_ICON)
                    ->collection('icon_green')
                    ->columnSpanFull()
                    ->required(),
                TextInput::make('title')
                    ->label('Keunggulan')
                    ->autocomplete(false)
                    ->columnSpanFull()
                    ->required(),
                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(3)
                    ->columnSpanFull()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('icon_green')
                    ->label('Ikon')
                    ->collection('icon_green')
                    ->imageSize(50)
                    ->defaultImageUrl(asset('icons/default-image-green.svg')),
                TextColumn::make('title')
                    ->label('Keunggulan')
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
            'index' => ManageSuperiorities::route('/'),
        ];
    }
}
