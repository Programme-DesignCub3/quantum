<?php

namespace App\Filament\Resources\RegisterGuarantees;

use App\Filament\Resources\RegisterGuarantees\Pages\ManageRegisterGuarantees;
use App\Models\RegisterGuarantee;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
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

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                Fieldset::make('Data Pribadi')
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('name')
                            ->label('Nama Lengkap'),
                        TextEntry::make('phone')
                            ->label('Nomor Handphone'),
                        TextEntry::make('email')
                            ->label('Email'),
                        TextEntry::make('address')
                            ->label('Alamat Lengkap'),
                    ]),
                Fieldset::make('Data Produk')
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('product_serial_number')
                            ->label('Nomor Seri Produk'),
                        TextEntry::make('product_category')
                            ->label('Kategori Produk'),
                        TextEntry::make('product_model')
                            ->label('Model Produk'),
                        TextEntry::make('purchase_date')
                            ->label('Tanggal Pembelian'),
                        TextEntry::make('purchase_place')
                            ->label('Tempat Pembelian'),
                        TextEntry::make('message')
                            ->label('Pesan'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Lengkap')
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
            'index' => ManageRegisterGuarantees::route('/'),
        ];
    }
}
