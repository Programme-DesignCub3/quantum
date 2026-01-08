<?php

namespace App\Filament\Clusters\Product\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('images')
                    ->label('Gambar')
                    ->collection('products')
                    ->imageSize(100)
                    ->filterMediaUsing(function (Collection $media): Collection {
                        return $media->take(1);
                    }),
                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->placeholder('Tidak ada kategori')
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Nama Produk')
                    ->searchable()
                    ->sortable(),
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
                SelectFilter::make('product_category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name'),
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
