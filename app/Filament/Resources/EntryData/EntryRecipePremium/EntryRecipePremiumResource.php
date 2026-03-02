<?php

namespace App\Filament\Resources\EntryData\EntryRecipePremium;

use App\Filament\Resources\EntryData\EntryRecipePremium\Pages\ManageEntryRecipePremium;
use App\Models\EntryData\EntryRecipePremium;
use App\Models\Recipe\PremiumMember;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class EntryRecipePremiumResource extends Resource
{
    protected static ?int $navigationSort = 5;

    protected static string | UnitEnum | null $navigationGroup = 'Entri Data';

    protected static ?string $navigationLabel = 'Resep Premium';

    protected static ?string $modelLabel = 'Resep Premium';

    protected static ?string $model = PremiumMember::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;

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
                TextColumn::make('whatsapp')
                    ->label('WhatsApp')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Tanggal Berlangganan')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                //
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageEntryRecipePremium::route('/'),
        ];
    }
}
