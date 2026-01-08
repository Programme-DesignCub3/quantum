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
        $oldFiles = app(PageSettings::class)->home_meta_image;
        $newFiles = $data['home_meta_image'] ?? null;

        $oldFiles = collect($oldFiles)->first();

        if ($oldFiles && $oldFiles !== $newFiles) {
            Storage::disk('public')->delete($oldFiles);
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
                        FileUpload::make('home_banner')
                            ->label('Banner Utama')
                            ->image()
                            ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                            ->multiple()
                            ->reorderable()
                            ->appendFiles()
                            ->maxSize(2048)
                            ->directory('home-banners')
                            ->columnSpanFull()
                            ->panelLayout('grid')
                            ->helperText('File berupa format gambar .jpeg .jpg .png .webp. Maksimal ukuran file 2MB. Bisa mengunggah lebih dari satu gambar.')
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
                    ])
            ]);
    }
}
