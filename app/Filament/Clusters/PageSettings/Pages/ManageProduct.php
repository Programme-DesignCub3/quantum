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

class ManageProduct extends SettingsPage
{
    protected static ?int $navigationSort = 3;

    protected static string | UnitEnum | null $navigationGroup = 'Produk';

    protected static ?string $navigationLabel = 'Produk';

    protected static ?string $title = 'Pengaturan Produk';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string $settings = PageSettings::class;

    protected static ?string $cluster = PageSettingsCluster::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $old_files = app(PageSettings::class)->product_meta_image;
        $old_why_choose_us = app(PageSettings::class)->product_why_choose_us ?? [];
        $new_files = $data['product_meta_image'] ?? null;
        $new_why_choose_us = $data['product_why_choose_us'] ?? [];

        $old_files = collect($old_files)->first();
        $old_why_choose_us_files = collect($old_why_choose_us)->pluck('image');
        $new_why_choose_us_files = collect($new_why_choose_us)->pluck('image');

        $deleted_why_choose_us_files = $old_why_choose_us_files->diff($new_why_choose_us_files);

        if ($old_files && $old_files !== $new_files) {
            Storage::disk('public')->delete($old_files);
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
                    ->description('Pengaturan meta tags untuk halaman produk.')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('product_meta_title')
                            ->label('Title')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        TextInput::make('product_meta_description')
                            ->label('Description')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        TextInput::make('product_meta_keywords')
                            ->label('Keywords')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        FileUpload::make('product_meta_image')
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
                    ->description('Pengaturan konten untuk halaman produk.')
                    ->columnSpanFull()
                    ->schema([
                        Section::make('Section Banner')
                            ->description('Pengaturan pada section banner di halaman produk.')
                            ->collapsible()
                            ->schema([
                                TextInput::make('product_title')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Textarea::make('product_description')
                                    ->label('Deskripsi')
                                    ->rows(3)
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                            ]),
                        Section::make('Section (Kenapa Pilih Kami)')
                            ->description('Pengaturan pada section (kenapa pilih kami) di halaman produk.')
                            ->collapsible()
                            ->schema([
                                TextInput::make('product_title_why')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Textarea::make('product_description_why')
                                    ->label('Deskripsi')
                                    ->rows(3)
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Repeater::make('product_why_choose_us')
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
                                            ->directory('product-images')
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
                        Section::make('Section Panduan')
                            ->description('Pengaturan pada section panduan di halaman produk.')
                            ->collapsible()
                            ->schema([
                                TextInput::make('product_title_guidance')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Textarea::make('product_description_guidance')
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
