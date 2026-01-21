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

class ManageFaq extends SettingsPage
{
    protected static ?int $navigationSort = 11;

    protected static string | UnitEnum | null $navigationGroup = 'Bantuan';

    protected static ?string $navigationLabel = 'FAQ';

    protected static ?string $title = 'Pengaturan FAQ';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string $settings = PageSettings::class;

    protected static ?string $cluster = PageSettingsCluster::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $old_files = app(PageSettings::class)->faq_meta_image;
        $new_files = $data['faq_meta_image'] ?? null;

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
                    ->description('Pengaturan meta tags untuk halaman FAQ.')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('faq_meta_title')
                            ->label('Title')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        TextInput::make('faq_meta_description')
                            ->label('Description')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        TextInput::make('faq_meta_keywords')
                            ->label('Keywords')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        FileUpload::make('faq_meta_image')
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
                    ->description('Pengaturan konten untuk halaman FAQ.')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('faq_title')
                            ->label('Judul')
                            ->autocomplete(false)
                            ->columnSpanFull()
                            ->required(),
                        Textarea::make('faq_description')
                            ->label('Deskripsi')
                            ->rows(3)
                            ->autocomplete(false)
                            ->columnSpanFull()
                            ->required(),
                        Section::make('Produk')
                            ->collapsible()
                            ->schema([
                                TextInput::make('faq_sub_title_product')
                                    ->label('Sub Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Repeater::make('faq_product')
                                    ->label('Daftar Pertanyaan')
                                    ->columnSpanFull()
                                    ->reorderableWithButtons()
                                    ->minItems(1)
                                    ->required()
                                    ->schema([
                                        TextInput::make('question')
                                            ->label('Pertanyaan')
                                            ->autocomplete(false)
                                            ->columnSpanFull()
                                            ->required(),
                                        Textarea::make('answer')
                                            ->label('Jawaban')
                                            ->rows(3)
                                            ->autocomplete(false)
                                            ->columnSpanFull()
                                            ->required(),
                                    ])
                            ]),
                        Section::make('Pembelian')
                            ->collapsible()
                            ->schema([
                                TextInput::make('faq_sub_title_purchase')
                                    ->label('Sub Judul Pembelian')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Repeater::make('faq_purchase')
                                    ->label('Daftar Pertanyaan')
                                    ->columnSpanFull()
                                    ->reorderableWithButtons()
                                    ->minItems(1)
                                    ->required()
                                    ->schema([
                                        TextInput::make('question')
                                            ->label('Pertanyaan')
                                            ->autocomplete(false)
                                            ->columnSpanFull()
                                            ->required(),
                                        Textarea::make('answer')
                                            ->label('Jawaban')
                                            ->rows(3)
                                            ->autocomplete(false)
                                            ->columnSpanFull()
                                            ->required(),
                                    ])
                            ]),
                        Section::make('Garansi')
                            ->collapsible()
                            ->schema([
                                TextInput::make('faq_sub_title_guarantee')
                                    ->label('Sub Judul Garansi')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                Repeater::make('faq_guarantee')
                                    ->label('Daftar Pertanyaan')
                                    ->columnSpanFull()
                                    ->reorderableWithButtons()
                                    ->minItems(1)
                                    ->required()
                                    ->schema([
                                        TextInput::make('question')
                                            ->label('Pertanyaan')
                                            ->autocomplete(false)
                                            ->columnSpanFull()
                                            ->required(),
                                        Textarea::make('answer')
                                            ->label('Jawaban')
                                            ->rows(3)
                                            ->autocomplete(false)
                                            ->columnSpanFull()
                                            ->required(),
                                    ])
                            ])
                    ])
            ]);
    }
}
