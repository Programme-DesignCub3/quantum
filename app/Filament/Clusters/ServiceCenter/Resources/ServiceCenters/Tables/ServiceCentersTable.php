<?php

namespace App\Filament\Clusters\ServiceCenter\Resources\ServiceCenters\Tables;

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
                TextColumn::make('typeService.name')
                    ->label('Tipe')
                    ->searchable()
                    ->placeholder('Tidak ada tipe')
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
