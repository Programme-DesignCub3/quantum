<?php

namespace App\Filament\Clusters\PageSettings\Pages;

use App\Constant\AcceptedFileConstant;
use App\Filament\Clusters\PageSettings\PageSettingsCluster;
use App\Settings\PageSettings;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Storage;
use UnitEnum;

class ManageDistributor extends SettingsPage
{
    protected static ?int $navigationSort = 4;

    protected static string | UnitEnum | null $navigationGroup = 'Distributor';

    protected static ?string $navigationLabel = 'Distributor';

    protected static ?string $title = 'Pengaturan Distributor';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string $settings = PageSettings::class;

    protected static ?string $cluster = PageSettingsCluster::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $old_files = app(PageSettings::class)->distributor_meta_image;
        $new_files = $data['distributor_meta_image'] ?? null;

        $old_files = collect($old_files)->first();

        if ($old_files && $old_files !== $new_files) {
            Storage::disk('public')->delete($old_files);
        }

        return $data;
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Meta Tags')
                    ->description('Pengaturan meta tags untuk halaman distributor.')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('distributor_meta_title')
                            ->label('Title')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        TextInput::make('distributor_meta_description')
                            ->label('Description')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        TextInput::make('distributor_meta_keywords')
                            ->label('Keywords')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        FileUpload::make('distributor_meta_image')
                            ->label('OG Image')
                            ->image()
                            ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                            ->maxFiles(1)
                            ->maxSize(2048)
                            ->directory('og-images')
                            ->columnSpanFull()
                            ->helperText('File berupa format gambar .jpeg .jpg .png .webp Maksimal ukuran file 2MB.')
                    ]),
                Section::make('Konten')
                    ->description('Pengaturan konten untuk halaman distributor.')
                    ->columnSpanFull()
                    ->schema([
                        Section::make('Section Distributor')
                            ->description('Pengaturan pada section utama halaman distributor.')
                            ->collapsible()
                            ->schema([
                                TextInput::make('distributor_title')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Textarea::make('distributor_description')
                                    ->label('Deskripsi')
                                    ->rows(3)
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                            ]),
                        Section::make('Section Benefit')
                            ->description('Pengaturan pada section benefit/keuntungan di halaman distributor.')
                            ->collapsible()
                            ->schema([
                                TextInput::make('distributor_title_benefit')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Textarea::make('distributor_description_benefit')
                                    ->label('Deskripsi')
                                    ->rows(3)
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Repeater::make('distributor_benefit')
                                    ->label('Benefit')
                                    ->minItems(1)
                                    ->columnSpanFull()
                                    ->reorderableWithButtons()
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Judul')
                                            ->autocomplete(false)
                                            ->columnSpanFull()
                                            ->required(),
                                        Textarea::make('description')
                                            ->label('Deskripsi')
                                            ->rows(3)
                                            ->autocomplete(false)
                                            ->columnSpanFull()
                                            ->required(),
                                    ])
                            ]),
                        Section::make('Section Form')
                            ->description('Pengaturan pada section form di halaman distributor.')
                            ->collapsible()
                            ->schema([
                                TextInput::make('distributor_title_form')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                            ]),
                        Section::make('Section Lokasi')
                            ->description('Pengaturan pada section lokasi di halaman distributor.')
                            ->collapsible()
                            ->schema([
                                TextInput::make('distributor_title_location')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Textarea::make('distributor_description_location')
                                    ->label('Deskripsi')
                                    ->rows(3)
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                            ]),
                    ]),
            ]);
    }
}
