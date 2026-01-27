<?php

namespace App\Filament\Resources\CatalogDownloads;

use App\Filament\Infolists\Components\CatalogEntry;
use App\Filament\Resources\CatalogDownloads\Pages\ManageCatalogDownloads;
use App\Models\CatalogDownload;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\ViewAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class CatalogDownloadResource extends Resource
{
    protected static ?int $navigationSort = 2;

    protected static string | UnitEnum | null $navigationGroup = 'Entri Data';

    protected static ?string $navigationLabel = 'Pengunduh Katalog';

    protected static ?string $modelLabel = 'Pengunduh Katalog';

    protected static ?string $model = CatalogDownload::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label('Nama'),
                TextEntry::make('email')
                    ->label('Email'),
                TextEntry::make('whatsapp')
                    ->label('WhatsApp'),
                TextEntry::make('created_at')
                    ->label('Tanggal Unduh'),
                CatalogEntry::make('downloaded_catalogs')
                    ->label('Katalog yang diunduh'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Tanggal Unduh')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
            ])
            ->toolbarActions([
                //
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageCatalogDownloads::route('/'),
        ];
    }
}
