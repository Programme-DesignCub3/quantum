<?php

namespace App\Filament\Clusters\PageSettings\Pages;

use App\Constant\AcceptedFileConstant;
use App\Filament\Clusters\PageSettings\PageSettingsCluster;
use App\Settings\PageSettings;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Storage;
use UnitEnum;

class ManageGuidance extends SettingsPage
{
    protected static ?int $navigationSort = 14;

    protected static string | UnitEnum | null $navigationGroup = 'Bantuan';

    protected static ?string $navigationLabel = 'Edukasi dan Panduan';

    protected static ?string $title = 'Pengaturan Edukasi dan Panduan';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string $settings = PageSettings::class;

    protected static ?string $cluster = PageSettingsCluster::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $old_files = app(PageSettings::class)->guidance_meta_image;
        $new_files = $data['guidance_meta_image'] ?? null;

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
                    ->description('Pengaturan meta tags untuk halaman edukasi dan panduan.')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('guidance_meta_title')
                            ->label('Title')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        TextInput::make('guidance_meta_description')
                            ->label('Description')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        TextInput::make('guidance_meta_keywords')
                            ->label('Keywords')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        FileUpload::make('guidance_meta_image')
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
                    ->description('Pengaturan konten untuk halaman edukasi dan panduan.')
                    ->columnSpanFull()
                    ->schema([
                        Section::make('Section Panduan')
                            ->description('Pengaturan pada section panduan di halaman edukasi dan panduan.')
                            ->columnSpanFull()
                            ->collapsible()
                            ->schema([
                                TextInput::make('guidance_title')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Textarea::make('guidance_description')
                                    ->label('Deskripsi')
                                    ->rows(3)
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                            ]),
                        Section::make('Section Artikel')
                            ->description('Pengaturan pada section artikel di halaman edukasi dan panduan.')
                            ->columnSpanFull()
                            ->collapsible()
                            ->schema([
                                TextInput::make('guidance_title_article')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Textarea::make('guidance_description_article')
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
