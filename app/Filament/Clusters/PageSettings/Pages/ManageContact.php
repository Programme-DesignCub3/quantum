<?php

namespace App\Filament\Clusters\PageSettings\Pages;

use App\Constant\AcceptedFileConstant;
use App\Filament\Clusters\PageSettings\PageSettingsCluster;
use App\Settings\PageSettings;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Storage;
use UnitEnum;

class ManageContact extends SettingsPage
{
    protected static ?int $navigationSort = 12;

    protected static string | UnitEnum | null $navigationGroup = 'Bantuan';

    protected static ?string $navigationLabel = 'Kontak';

    protected static ?string $title = 'Pengaturan Kontak';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string $settings = PageSettings::class;

    protected static ?string $cluster = PageSettingsCluster::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $old_files = app(PageSettings::class)->contact_meta_image;
        $old_office_image = app(PageSettings::class)->contact_office_image;
        $new_files = $data['contact_meta_image'] ?? null;
        $new_office_image = $data['contact_office_image'] ?? null;

        $old_files = collect($old_files)->first();
        $old_office_image = collect($old_office_image)->first();

        if ($old_files && $old_files !== $new_files) {
            Storage::disk('public')->delete($old_files);
        }

        if ($old_office_image && $old_office_image !== $new_office_image) {
            Storage::disk('public')->delete($old_office_image);
        }

        return $data;
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Meta Tags')
                    ->description('Pengaturan meta tags untuk halaman kontak.')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('contact_meta_title')
                            ->label('Title')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        TextInput::make('contact_meta_description')
                            ->label('Description')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        TextInput::make('contact_meta_keywords')
                            ->label('Keywords')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        FileUpload::make('contact_meta_image')
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
                    ->description('Pengaturan konten untuk halaman kontak.')
                    ->columnSpanFull()
                    ->schema([
                        Section::make('Section Kontak')
                            ->description('Pengaturan pada section kontak di halaman kontak.')
                            ->columnSpanFull()
                            ->collapsible()
                            ->schema([
                                TextInput::make('contact_title')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Textarea::make('contact_description')
                                    ->label('Deskripsi')
                                    ->rows(3)
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                            ]),
                        Section::make('Section Service Center')
                            ->description('Pengaturan pada section service center di halaman kontak.')
                            ->columnSpanFull()
                            ->collapsible()
                            ->schema([
                                TextInput::make('contact_title_service')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Textarea::make('contact_description_service')
                                    ->label('Deskripsi')
                                    ->rows(3)
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                            ]),
                        Section::make('Call Center')
                            ->collapsible()
                            ->schema([
                                TextInput::make('contact_cc_number')
                                    ->label('Nomor')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->prefixIcon(Heroicon::Phone)
                                    ->required(),
                                Textarea::make('contact_cc_information')
                                    ->label('Informasi Lainnya')
                                    ->rows(3)
                                    ->columnSpanFull()
                                    ->required(),
                                Repeater::make('contact_cc_operational')
                                    ->label('Jam Operasional')
                                    ->columnSpanFull()
                                    ->reorderableWithButtons()
                                    ->minItems(1)
                                    ->required()
                                    ->schema([
                                        TextInput::make('day')
                                            ->label('Hari (From - To)')
                                            ->autocomplete(false)
                                            ->belowContent('Contoh: Senin - Jumat')
                                            ->columnSpanFull()
                                            ->required(),
                                        Flex::make([
                                            TimePicker::make('from_hour')
                                                ->label('Jam (From)')
                                                ->prefix('Dari')
                                                ->seconds(false)
                                                ->columnSpan(1)
                                                ->required(),
                                            TimePicker::make('to_hour')
                                                ->label('Jam (To)')
                                                ->prefix('Sampai')
                                                ->seconds(false)
                                                ->columnSpan(1)
                                                ->required(),
                                            Select::make('timezone')
                                                ->label('Zona Waktu')
                                                ->options([
                                                    'WIB' => 'WIB',
                                                    'WITA' => 'WITA',
                                                    'WIT' => 'WIT',
                                                ])
                                                ->default('WIB')
                                                ->selectablePlaceholder(false)
                                                ->columnSpan(1)
                                                ->required(),
                                        ])
                                    ]),
                            ]),
                        Section::make('WhatsApp')
                            ->collapsible()
                            ->schema([
                                TextInput::make('contact_wa_number')
                                    ->label('Nomor')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->prefixIcon(Heroicon::Phone)
                                    ->required(),
                                Textarea::make('contact_wa_information')
                                    ->label('Informasi Lainnya')
                                    ->rows(3)
                                    ->columnSpanFull()
                                    ->required(),
                                Repeater::make('contact_wa_operational')
                                    ->label('Jam Operasional')
                                    ->columnSpanFull()
                                    ->reorderableWithButtons()
                                    ->minItems(1)
                                    ->required()
                                    ->schema([
                                        TextInput::make('day')
                                            ->label('Hari (From - To)')
                                            ->autocomplete(false)
                                            ->belowContent('Contoh: Senin - Jumat')
                                            ->columnSpanFull()
                                            ->required(),
                                        Flex::make([
                                            TimePicker::make('from_hour')
                                                ->label('Jam (From)')
                                                ->prefix('Dari')
                                                ->seconds(false)
                                                ->columnSpan(1)
                                                ->required(),
                                            TimePicker::make('to_hour')
                                                ->label('Jam (To)')
                                                ->prefix('Sampai')
                                                ->seconds(false)
                                                ->columnSpan(1)
                                                ->required(),
                                            Select::make('timezone')
                                                ->label('Zona Waktu')
                                                ->options([
                                                    'WIB' => 'WIB',
                                                    'WITA' => 'WITA',
                                                    'WIT' => 'WIT',
                                                ])
                                                ->default('WIB')
                                                ->selectablePlaceholder(false)
                                                ->columnSpan(1)
                                                ->required(),
                                        ])
                                    ]),
                            ]),
                        Section::make('Email')
                            ->collapsible()
                            ->schema([
                                TextInput::make('contact_email')
                                    ->label('Email')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->prefixIcon(Heroicon::Envelope)
                                    ->required(),
                                Textarea::make('contact_email_information')
                                    ->label('Informasi Lainnya')
                                    ->rows(3)
                                    ->columnSpanFull()
                                    ->required(),
                                Repeater::make('contact_email_operational')
                                    ->label('Jam Operasional')
                                    ->columnSpanFull()
                                    ->reorderableWithButtons()
                                    ->minItems(1)
                                    ->required()
                                    ->schema([
                                        TextInput::make('day')
                                            ->label('Hari (From - To)')
                                            ->autocomplete(false)
                                            ->belowContent('Contoh: Senin - Jumat')
                                            ->columnSpanFull()
                                            ->required(),
                                        Flex::make([
                                            TimePicker::make('from_hour')
                                                ->label('Jam (From)')
                                                ->prefix('Dari')
                                                ->seconds(false)
                                                ->columnSpan(1)
                                                ->required(),
                                            TimePicker::make('to_hour')
                                                ->label('Jam (To)')
                                                ->prefix('Sampai')
                                                ->seconds(false)
                                                ->columnSpan(1)
                                                ->required(),
                                            Select::make('timezone')
                                                ->label('Zona Waktu')
                                                ->options([
                                                    'WIB' => 'WIB',
                                                    'WITA' => 'WITA',
                                                    'WIT' => 'WIT',
                                                ])
                                                ->default('WIB')
                                                ->selectablePlaceholder(false)
                                                ->columnSpan(1)
                                                ->required(),
                                        ])
                                    ]),
                            ]),
                        Section::make('Office')
                            ->collapsible()
                            ->schema([
                                FileUpload::make('contact_office_image')
                                    ->label('Foto Kantor/Gedung')
                                    ->image()
                                    ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                                    ->maxFiles(1)
                                    ->maxSize(2048)
                                    ->directory('contact-images')
                                    ->columnSpanFull()
                                    ->helperText('File berupa format gambar .jpeg .jpg .png .webp Maksimal ukuran file 2MB.'),
                                TextInput::make('contact_office_name')
                                    ->label('Nama Kantor/Gedung')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->prefixIcon(Heroicon::BuildingOffice)
                                    ->required(),
                                TextInput::make('contact_office_map')
                                    ->label('Link Peta (Google Maps)')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->prefixIcon(Heroicon::MapPin)
                                    ->url()
                                    ->required(),
                                Textarea::make('contact_office_address')
                                    ->label('Alamat')
                                    ->rows(3)
                                    ->columnSpanFull()
                                    ->required(),
                                Textarea::make('contact_office_information')
                                    ->label('Informasi Lainnya')
                                    ->rows(3)
                                    ->columnSpanFull()
                                    ->required(),
                                Repeater::make('contact_office_operational')
                                    ->label('Jam Operasional')
                                    ->columnSpanFull()
                                    ->reorderableWithButtons()
                                    ->minItems(1)
                                    ->required()
                                    ->schema([
                                        TextInput::make('day')
                                            ->label('Hari (From - To)')
                                            ->autocomplete(false)
                                            ->belowContent('Contoh: Senin - Jumat')
                                            ->columnSpanFull()
                                            ->required(),
                                        Flex::make([
                                            TimePicker::make('from_hour')
                                                ->label('Jam (From)')
                                                ->prefix('Dari')
                                                ->seconds(false)
                                                ->columnSpan(1)
                                                ->required(),
                                            TimePicker::make('to_hour')
                                                ->label('Jam (To)')
                                                ->prefix('Sampai')
                                                ->seconds(false)
                                                ->columnSpan(1)
                                                ->required(),
                                            Select::make('timezone')
                                                ->label('Zona Waktu')
                                                ->options([
                                                    'WIB' => 'WIB',
                                                    'WITA' => 'WITA',
                                                    'WIT' => 'WIT',
                                                ])
                                                ->default('WIB')
                                                ->selectablePlaceholder(false)
                                                ->columnSpan(1)
                                                ->required(),
                                        ])
                                    ]),
                            ]),
                        Section::make('Social Media')
                            ->collapsible()
                            ->schema([
                                TextInput::make('contact_socmed_tiktok')
                                    ->label('TikTok URL')
                                    ->url()
                                    ->prefixIcon(Heroicon::Link)
                                    ->required(),
                                TextInput::make('contact_socmed_linkedin')
                                    ->label('LinkedIn URL')
                                    ->url()
                                    ->prefixIcon(Heroicon::Link)
                                    ->required(),
                                TextInput::make('contact_socmed_youtube')
                                    ->label('YouTube URL')
                                    ->url()
                                    ->prefixIcon(Heroicon::Link)
                                    ->required(),
                                TextInput::make('contact_socmed_instagram')
                                    ->label('Instagram URL')
                                    ->url()
                                    ->prefixIcon(Heroicon::Link)
                                    ->required(),
                                TextInput::make('contact_socmed_facebook')
                                    ->label('Facebook URL')
                                    ->url()
                                    ->prefixIcon(Heroicon::Link)
                                    ->required(),
                                Textarea::make('contact_socmed_information')
                                    ->label('Informasi Lainnya')
                                    ->rows(3)
                                    ->columnSpanFull()
                                    ->required(),
                                Repeater::make('contact_socmed_operational')
                                    ->label('Jam Operasional')
                                    ->columnSpanFull()
                                    ->reorderableWithButtons()
                                    ->minItems(1)
                                    ->required()
                                    ->schema([
                                        TextInput::make('day')
                                            ->label('Hari (From - To)')
                                            ->autocomplete(false)
                                            ->belowContent('Contoh: Senin - Jumat')
                                            ->columnSpanFull()
                                            ->required(),
                                        Flex::make([
                                            TimePicker::make('from_hour')
                                                ->label('Jam (From)')
                                                ->prefix('Dari')
                                                ->seconds(false)
                                                ->columnSpan(1)
                                                ->required(),
                                            TimePicker::make('to_hour')
                                                ->label('Jam (To)')
                                                ->prefix('Sampai')
                                                ->seconds(false)
                                                ->columnSpan(1)
                                                ->required(),
                                            Select::make('timezone')
                                                ->label('Zona Waktu')
                                                ->options([
                                                    'WIB' => 'WIB',
                                                    'WITA' => 'WITA',
                                                    'WIT' => 'WIT',
                                                ])
                                                ->default('WIB')
                                                ->selectablePlaceholder(false)
                                                ->columnSpan(1)
                                                ->required(),
                                        ])
                                    ]),
                            ]),
                    ])
            ]);
    }
}
