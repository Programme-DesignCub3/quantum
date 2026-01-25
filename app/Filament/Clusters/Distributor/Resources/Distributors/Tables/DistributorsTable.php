<?php

namespace App\Filament\Clusters\Distributor\Resources\Distributors\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class DistributorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Distributor')
                    ->searchable()
                    ->limit(30),
                TextColumn::make('area.area')
                    ->label('Area')
                    ->placeholder('Tidak ada area')
                    ->sortable()
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
                SelectFilter::make('area_distributor_id')
                    ->label('Area Distributor')
                    ->relationship('area', 'area'),
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
}
