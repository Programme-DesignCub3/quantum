<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use BackedEnum;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class ManageGeneral extends SettingsPage
{
    protected static ?int $navigationSort = 1;

    protected static string | UnitEnum | null $navigationGroup = 'Pengaturan';

    protected static ?string $navigationLabel = 'Umum';

    protected static ?string $title = 'Pengaturan Umum';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string $settings = GeneralSettings::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Sosial Media')
                    ->description('Atur tautan sosial media yang akan ditampilkan di website.')
                    ->aside()
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('linkedin_url')
                            ->label('LinkedIn URL')
                            ->url()
                            ->prefixIcon(Heroicon::Link)
                            ->required(),
                        TextInput::make('facebook_url')
                            ->label('Facebook URL')
                            ->url()
                            ->prefixIcon(Heroicon::Link)
                            ->required(),
                        TextInput::make('youtube_url')
                            ->label('YouTube URL')
                            ->url()
                            ->prefixIcon(Heroicon::Link)
                            ->required(),
                        TextInput::make('instagram_url')
                            ->label('Instagram URL')
                            ->url()
                            ->prefixIcon(Heroicon::Link)
                            ->required(),
                        TextInput::make('tiktok_url')
                            ->label('Tiktok URL')
                            ->url()
                            ->prefixIcon(Heroicon::Link)
                            ->required(),
                    ]),
                Section::make('Informasi Kontak')
                    ->description('Atur informasi kontak yang akan ditampilkan di website.')
                    ->aside()
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('phone_number')
                            ->label('Nomor Telepon')
                            ->required(),
                        TextInput::make('email_address')
                            ->label('Alamat Email')
                            ->email()
                            ->required(),
                        TextInput::make('whatsapp_number')
                            ->label('Nomor WhatsApp')
                            ->required(),
                        TextInput::make('customer_care')
                            ->label('Customer Care')
                            ->required(),
                    ])
            ]);
    }
}
