<?php

namespace App\Filament\Resources\RegisterDistributors;

use App\Filament\Resources\RegisterDistributors\Pages\ManageRegisterDistributors;
use App\Models\Distributor\RegisterDistributor;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class RegisterDistributorResource extends Resource
{
    protected static ?int $navigationSort = 3;

    protected static string | UnitEnum | null $navigationGroup = 'Entri Data';

    protected static ?string $navigationLabel = 'Pendaftaran Distributor';

    protected static ?string $modelLabel = 'Pendaftaran Distributor';

    protected static ?string $model = RegisterDistributor::class;

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
                TextEntry::make('distributed_area')
                    ->label('Wilayah yang diminati'),
                TextEntry::make('address')
                    ->label('Alamat'),
                TextEntry::make('message')
                    ->label('Pesan'),
                TextEntry::make('created_at')
                    ->label('Tanggal Pendaftaran'),
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
                    ->label('Tanggal Pendaftaran')
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
            'index' => ManageRegisterDistributors::route('/'),
        ];
    }
}
