<?php

namespace App\Filament\Resources\TutorialVideos;

use App\Constant\AcceptedFileConstant;
use App\Filament\Resources\TutorialVideos\Pages\ManageTutorialVideos;
use App\Models\Tutorial;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use UnitEnum;

class TutorialVideoResource extends Resource
{
    protected static ?int $navigationSort = 5;

    protected static string | UnitEnum | null $navigationGroup = 'Data';

    protected static ?string $navigationLabel = 'Tutorial Video';

    protected static ?string $modelLabel = 'Tutorial Video';

    protected static ?string $model = Tutorial::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedVideoCamera;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                SpatieMediaLibraryFileUpload::make('thumbnail')
                    ->label('Thumbnail')
                    ->collection('tutorial-video')
                    ->image()
                    ->maxSize(2048)
                    ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                    ->columnSpanFull()
                    ->belowContent('File berupa format gambar .jpeg .jpg .png .webp. Maksimal ukuran file 2MB.')
                    ->required(),
                TextInput::make('title')
                    ->label('Judul')
                    ->autocomplete(false)
                    ->required()
                    ->columnSpanFull(),
                Select::make('product_category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name')
                    ->columnSpanFull()
                    ->required(),
                ToggleButtons::make('is_published')
                    ->label('Status Publikasi')
                    ->options([
                        1 => 'Publik',
                        0 => 'Draf',
                    ])
                    ->colors([
                        1 => 'success',
                        0 => 'warning',
                    ])
                    ->inline()
                    ->default(1)
                    ->required(),
                Builder::make('video')
                    ->label('Video Tutorial')
                    ->blockNumbers(false)
                    ->maxItems(1)
                    ->columnSpanFull()
                    ->required()
                    ->schema([
                        Block::make('local')
                            ->label('Video Upload')
                            ->icon('heroicon-o-video-camera')
                            ->schema([
                                FileUpload::make('value')
                                    ->label('Video')
                                    ->belowContent('File berupa format video .mp4. Maksimal ukuran file 12MB.')
                                    ->maxFiles(1)
                                    ->maxSize(12288)
                                    ->directory('tutorial-video')
                                    ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_VIDEO)
                                    ->required(),
                            ]),
                        Block::make('youtube')
                            ->label('Video YouTube')
                            ->icon('heroicon-o-play-circle')
                            ->schema([
                                TextInput::make('value')
                                    ->label('URL YouTube')
                                    ->url()
                                    ->prefixIcon(Heroicon::Link)
                                    ->required(),
                            ])


                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->collection('tutorial-video')
                    ->imageWidth(80),
                TextColumn::make('title')
                    ->label('Judul')
                    ->limit(30)
                    ->searchable(),
                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->placeholder('Tidak ada kategori')
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
                SelectFilter::make('product_category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name'),
            ])
            ->recordActions([
                EditAction::make()
                    ->mutateDataUsing(function (array $data): array {
                        if(isset($data['video'][0]['type']) && $data['video'][0]['type'] === 'youtube') {
                            preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $data['video'][0]['data']['value'], $matches);
                            if (isset($matches[1])) {
                                $data['video'][0]['data']['value'] = $matches[1];
                            } else {
                                $data['video'][0]['data']['value'] = '';
                            }
                        }

                        return $data;
                    }),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageTutorialVideos::route('/'),
        ];
    }
}
