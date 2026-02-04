<?php

namespace App\Filament\Resources\ServiceCenters\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ServiceCentersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->limit(30),
                TextColumn::make('type')
                    ->label('Tipe')
                    ->badge()
                    ->color('gray')
                    ->formatStateUsing(function(string $state) {
                        switch($state) {
                            case 'service_center':
                                return 'Service Center';
                            case 'partner':
                                return 'Mitra';
                            default:
                                return 'Lainnya';
                        }
                    })
                    ->searchable()
                    ->sortable(),
                TextColumn::make('area')
                    ->label('Wilayah/Area')
                    ->placeholder('Tidak ada wilayah/area')
                    ->searchable(),
                ToggleColumn::make('is_published')
                    ->label('Status Publikasi')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('is_published')
                    ->label('Status Publikasi')
                    ->options([
                        1 => 'Publikasi',
                        0 => 'Draf',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                //
            ])
            ->defaultSort('created_at', 'desc');
    }
}
