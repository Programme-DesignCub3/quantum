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

class ManageHome extends SettingsPage
{
    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Beranda';

    protected static ?string $title = 'Pengaturan Beranda';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string $settings = PageSettings::class;

    protected static ?string $cluster = PageSettingsCluster::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $old_files = app(PageSettings::class)->home_meta_image;
        $old_banners = app(PageSettings::class)->home_banner ?? [];
        $old_why_choose_us = app(PageSettings::class)->home_why_choose_us ?? [];
        $new_files = $data['home_meta_image'] ?? null;
        $new_banners = $data['home_banner'] ?? [];
        $new_why_choose_us = $data['home_why_choose_us'] ?? [];

        $old_files = collect($old_files)->first();
        $old_banners_files = collect($old_banners);
        $old_why_choose_us_files = collect($old_why_choose_us)->pluck('image');
        $new_banners_files = collect($new_banners);
        $new_why_choose_us_files = collect($new_why_choose_us)->pluck('image');

        $deleted_file_banners = $old_banners_files->diff($new_banners_files);
        $deleted_why_choose_us_files = $old_why_choose_us_files->diff($new_why_choose_us_files);

        if ($old_files && $old_files !== $new_files) {
            Storage::disk('public')->delete($old_files);
        }

        foreach ($deleted_file_banners as $file) {
            Storage::disk('public')->delete($file);
        }

        foreach ($deleted_why_choose_us_files as $file) {
            Storage::disk('public')->delete($file);
        }

        return $data;
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Meta Tags')
                    ->description('Pengaturan meta tags untuk halaman beranda.')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('home_meta_title')
                            ->label('Title')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        TextInput::make('home_meta_description')
                            ->label('Description')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        TextInput::make('home_meta_keywords')
                            ->label('Keywords')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        FileUpload::make('home_meta_image')
                            ->label('OG Image')
                            ->image()
                            ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                            ->maxFiles(1)
                            ->maxSize(2048)
                            ->directory('og-images')
                            ->columnSpanFull()
                            ->helperText('File berupa format gambar .jpeg .jpg .png .webp. Maksimal ukuran file 2MB.')
                    ]),
                Section::make('Konten')
                    ->description('Pengaturan konten untuk halaman beranda.')
                    ->columnSpanFull()
                    ->schema([
                        Section::make('Section Banner')
                            ->description('Pengaturan pada section banner utama di halaman beranda.')
                            ->collapsible()
                            ->schema([
                                FileUpload::make('home_banner')
                                    ->label('Banner Utama')
                                    ->image()
                                    ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                                    ->multiple()
                                    ->reorderable()
                                    ->appendFiles()
                                    ->maxSize(2048)
                                    ->directory('home-images')
                                    ->columnSpanFull()
                                    ->panelLayout('grid')
                                    ->helperText('File berupa format gambar .jpeg .jpg .png .webp. Rekomendasi rasio 25:48. Maksimal ukuran file 2MB. Bisa mengunggah lebih dari satu gambar.')
                                    ->required(),
                                TextInput::make('home_title_banner')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Textarea::make('home_description_banner')
                                    ->label('Deskripsi')
                                    ->rows(3)
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                            ]),
                        Section::make('Section Produk')
                            ->description('Pengaturan pada section produk di halaman beranda.')
                            ->collapsible()
                            ->schema([
                                TextInput::make('home_title_product')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Textarea::make('home_description_product')
                                    ->label('Deskripsi')
                                    ->rows(3)
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                            ]),
                        Section::make('Section (Kenapa Pilih Kami)')
                            ->description('Pengaturan pada section (kenapa pilih kami) di halaman beranda.')
                            ->collapsible()
                            ->schema([
                                TextInput::make('home_title_why')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Textarea::make('home_description_why')
                                    ->label('Deskripsi')
                                    ->rows(3)
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Repeater::make('home_why_choose_us')
                                    ->label('Kenapa Pilih Kami')
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
                                            ->directory('home-images')
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
                        Section::make('Section Testimonial')
                            ->description('Pengaturan pada section testimonial di halaman beranda.')
                            ->collapsible()
                            ->schema([
                                TextInput::make('home_title_testimonial')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Repeater::make('home_testimonials')
                                    ->label('Testimonial')
                                    ->columnSpanFull()
                                    ->reorderableWithButtons()
                                    ->minItems(2)
                                    ->required()
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('Nama')
                                            ->required(),
                                        TextInput::make('age')
                                            ->label('Usia')
                                            ->numeric()
                                            ->suffix('Tahun')
                                            ->required(),
                                        TextInput::make('origin')
                                            ->label('Asal')
                                            ->required(),
                                        Textarea::make('testimonial')
                                            ->label('Testimonial')
                                            ->rows(3)
                                            ->required(),
                                    ])
                            ]),
                        Section::make('Section Artikel')
                            ->description('Pengaturan pada section artikel di halaman beranda.')
                            ->collapsible()
                            ->schema([
                                TextInput::make('home_title_article')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                            ]),
                        Section::make('Section Banner Bawah')
                            ->description('Pengaturan banner bawah pada halaman beranda.')
                            ->collapsible()
                            ->schema([
                                TextInput::make('home_title_banner_bottom')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Textarea::make('home_description_banner_bottom')
                                    ->label('Deskripsi')
                                    ->rows(3)
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                            ])
                    ])
            ]);
    }
}
