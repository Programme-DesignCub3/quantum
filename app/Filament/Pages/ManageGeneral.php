<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use BackedEnum;
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
                Section::make('Pengaturan Umum')
                    ->description('Atur pengaturan umum yang akan diterapkan di website.')
                    ->columnSpanFull()
                    ->schema([
                        Repeater::make('operational_hours')
                            ->label('Jam Operasional')
                            ->columnSpanFull()
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
                        Textarea::make('footer_description')
                            ->label('Deskripsi')
                            ->belowLabel('Deskripsi yang akan ditampilkan di bagian footer website.')
                            ->rows(3)
                            ->columnSpanFull()
                            ->required(),
                    ]),
            ]);
    }
}
