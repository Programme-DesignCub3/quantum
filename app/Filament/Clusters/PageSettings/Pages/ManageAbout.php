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

class ManageAbout extends SettingsPage
{
    protected static ?int $navigationSort = 2;

    protected static string | UnitEnum | null $navigationGroup = 'Tentang';

    protected static ?string $navigationLabel = 'Tentang';

    protected static ?string $title = 'Pengaturan Tentang';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string $settings = PageSettings::class;

    protected static ?string $cluster = PageSettingsCluster::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $old_files = app(PageSettings::class)->about_meta_image;
        $old_history = app(PageSettings::class)->about_history ?? [];
        $old_award = app(PageSettings::class)->about_award ?? [];
        $new_files = $data['about_meta_image'] ?? null;
        $new_history = $data['about_history'] ?? [];
        $new_award = $data['about_award'] ?? [];

        $old_files = collect($old_files)->first();
        $old_history_files = collect($old_history)->pluck('image');
        $old_award_files = collect($old_award)
            ->flatMap(function ($year_item) {
                return collect($year_item['awards'])->pluck('image');
            });

        $new_history_files = collect($new_history)->pluck('image');
        $new_award_files = collect($new_award)
            ->flatMap(function ($year_item) {
                return collect($year_item['awards'])->pluck('image');
            });

        $deleted_history_files = $old_history_files->diff($new_history_files);
        $deleted_award_files = $old_award_files->diff($new_award_files);

        if ($old_files && $old_files !== $new_files) {
            Storage::disk('public')->delete($old_files);
        }

        foreach ($deleted_history_files as $file) {
            Storage::disk('public')->delete($file);
        }

        foreach ($deleted_award_files as $file) {
            Storage::disk('public')->delete($file);
        }

        return $data;
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Meta Tags')
                    ->description('Pengaturan meta tags untuk halaman tentang.')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('about_meta_title')
                            ->label('Title')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        TextInput::make('about_meta_description')
                            ->label('Description')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        TextInput::make('about_meta_keywords')
                            ->label('Keywords')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        FileUpload::make('about_meta_image')
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
                    ->description('Pengaturan konten untuk halaman tentang.')
                    ->columnSpanFull()
                    ->schema([
                        Section::make('Section Banner')
                            ->description('Pengaturan pada section banner di halaman tentang.')
                            ->collapsible()
                            ->schema([
                                TextInput::make('about_title')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Textarea::make('about_description')
                                    ->label('Deskripsi')
                                    ->rows(3)
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                            ]),
                        Section::make('Section Utama')
                            ->description('Pengaturan pada section utama di halaman tentang.')
                            ->collapsible()
                            ->schema([
                                TextInput::make('about_title_explain')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Textarea::make('about_description_explain')
                                    ->label('Deskripsi')
                                    ->rows(3)
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                            ]),
                        Section::make('Section Sejarah')
                            ->description('Pengaturan pada section sejarah di halaman tentang.')
                            ->collapsible()
                            ->schema([
                                TextInput::make('about_title_history')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Textarea::make('about_description_history')
                                    ->label('Deskripsi')
                                    ->rows(3)
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Repeater::make('about_history')
                                    ->label('Sejarah Perusahaan')
                                    ->columnSpanFull()
                                    ->reorderableWithButtons()
                                    ->minItems(1)
                                    ->required()
                                    ->schema([
                                        FileUpload::make('image')
                                            ->label('Gambar')
                                            ->belowContent('File berupa format gambar .jpeg .jpg .png .webp. Maksimal ukuran file 2MB.')
                                            ->image()
                                            ->maxSize(2048)
                                            ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                                            ->directory('about-images')
                                            ->columnSpanFull()
                                            ->required(),
                                        TextInput::make('title')
                                            ->label('Judul')
                                            ->autocomplete(false)
                                            ->columnSpanFull()
                                            ->required(),
                                        Textarea::make('description')
                                            ->label('Deskripsi')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                        Section::make('Section Visi & Misi')
                            ->description('Pengaturan pada section visi & misi di halaman tentang.')
                            ->collapsible()
                            ->schema([
                                TextInput::make('about_title_vision_mission')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Textarea::make('about_description_vision_mission')
                                    ->label('Deskripsi')
                                    ->rows(3)
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                            ]),
                        Section::make('Section Visi')
                            ->description('Pengaturan pada section visi di halaman tentang.')
                            ->collapsible()
                            ->schema([
                                TextInput::make('about_title_vision')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Textarea::make('about_description_vision')
                                    ->label('Deskripsi')
                                    ->rows(3)
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                            ]),
                        Section::make('Section Misi')
                            ->description('Pengaturan pada section misi di halaman tentang.')
                            ->collapsible()
                            ->schema([
                                TextInput::make('about_title_mission')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Textarea::make('about_description_mission')
                                    ->label('Deskripsi')
                                    ->rows(3)
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                            ]),
                        Section::make('Section Penghargaan')
                            ->description('Pengaturan pada section penghargaan di halaman tentang.')
                            ->collapsible()
                            ->schema([
                                TextInput::make('about_title_award')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Textarea::make('about_description_award')
                                    ->label('Deskripsi')
                                    ->rows(3)
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Repeater::make('about_award')
                                    ->label('Daftar Penghargaan')
                                    ->columnSpanFull()
                                    ->reorderableWithButtons()
                                    ->minItems(1)
                                    ->required()
                                    ->schema([
                                        TextInput::make('year')
                                            ->label('Tahun')
                                            ->autocomplete(false)
                                            ->columnSpanFull()
                                            ->required(),
                                        Repeater::make('awards')
                                            ->label('Penghargaan')
                                            ->columnSpanFull()
                                            ->reorderableWithButtons()
                                            ->minItems(1)
                                            ->required()
                                            ->schema([
                                                FileUpload::make('image')
                                                    ->label('Gambar')
                                                    ->belowContent('File berupa format gambar .jpeg .jpg .png .webp. Maksimal ukuran file 2MB.')
                                                    ->image()
                                                    ->maxSize(2048)
                                                    ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                                                    ->directory('about-images')
                                                    ->columnSpanFull()
                                                    ->required(),
                                                TextInput::make('title')
                                                    ->label('Judul')
                                                    ->autocomplete(false)
                                                    ->columnSpanFull()
                                                    ->required(),
                                                Textarea::make('description')
                                                    ->label('Deskripsi')
                                                    ->rows(3)
                                                    ->columnSpanFull(),
                                            ])
                                    ]),
                            ]),
                        Section::make('Section Marketplace')
                            ->description('Pengaturan pada section marketplace di halaman tentang.')
                            ->collapsible()
                            ->schema([
                                TextInput::make('about_title_marketplace')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Textarea::make('about_description_marketplace')
                                    ->label('Deskripsi')
                                    ->rows(3)
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                            ]),
                    ])
            ]);
    }
}
