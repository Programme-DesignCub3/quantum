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

class ManageCustomerService extends SettingsPage
{
    protected static ?int $navigationSort = 8;

    protected static string | UnitEnum | null $navigationGroup = 'Bantuan';

    protected static ?string $navigationLabel = 'Layanan Pelanggan';

    protected static ?string $title = 'Pengaturan Layanan Pelanggan';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string $settings = PageSettings::class;

    protected static ?string $cluster = PageSettingsCluster::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $old_files = app(PageSettings::class)->cs_meta_image;
        $old_support = app(PageSettings::class)->cs_support;
        $new_files = $data['cs_meta_image'] ?? null;
        $new_support = $data['cs_support'] ?? [];

        $old_files = collect($old_files)->first();
        $old_support_files = collect($old_support)->pluck('image');
        $new_support_files = collect($new_support)->pluck('image');

        $deleted_support_files = $old_support_files->diff($new_support_files);

        if ($old_files && $old_files !== $new_files) {
            Storage::disk('public')->delete($old_files);
        }

        foreach ($deleted_support_files as $file) {
            Storage::disk('public')->delete($file);
        }

        return $data;
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Meta Tags')
                    ->description('Pengaturan meta tags untuk halaman layanan pelanggan.')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('cs_meta_title')
                            ->label('Title')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        TextInput::make('cs_meta_description')
                            ->label('Description')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        TextInput::make('cs_meta_keywords')
                            ->label('Keywords')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        FileUpload::make('cs_meta_image')
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
                    ->description('Pengaturan konten untuk halaman layanan pelanggan.')
                    ->columnSpanFull()
                    ->schema([
                        Section::make('Section Layanan Pelanggan')
                            ->description('Pengaturan pada section layanan pelanggan di halaman layanan pelanggan.')
                            ->columnSpanFull()
                            ->collapsible()
                            ->schema([
                                TextInput::make('cs_title')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Textarea::make('cs_description')
                                    ->label('Deskripsi')
                                    ->rows(3)
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                            ]),
                        Section::make('Section Support')
                            ->description('Pengaturan pada section support di halaman layanan pelanggan.')
                            ->columnSpanFull()
                            ->collapsible()
                            ->schema([
                                TextInput::make('cs_title_support')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Textarea::make('cs_description_support')
                                    ->label('Deskripsi')
                                    ->rows(3)
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Repeater::make('cs_support')
                                    ->label('Support Items')
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
                                            ->directory('cs-images')
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
                        Section::make('Section Edukasi dan Panduan')
                            ->description('Pengaturan pada section edukasi dan panduan di halaman layanan pelanggan.')
                            ->columnSpanFull()
                            ->collapsible()
                            ->schema([
                                TextInput::make('cs_title_guidance')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Textarea::make('cs_description_guidance')
                                    ->label('Deskripsi')
                                    ->rows(3)
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                            ]),
                        Section::make('Section Tutorial Video')
                            ->description('Pengaturan pada section tutorial video di halaman layanan pelanggan.')
                            ->columnSpanFull()
                            ->collapsible()
                            ->schema([
                                TextInput::make('cs_title_video')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Textarea::make('cs_description_video')
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
