<?php

namespace App\Filament\Clusters\PageSettings\Pages;

use App\Constant\AcceptedFileConstant;
use App\Filament\Clusters\PageSettings\PageSettingsCluster;
use App\Settings\PageSettings;
use BackedEnum;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Storage;
use UnitEnum;

class ManagePrivacyPolicy extends SettingsPage
{
    protected static ?int $navigationSort = 16;

    protected static string | UnitEnum | null $navigationGroup = 'Lainnya';

    protected static ?string $navigationLabel = 'Kebijakan Privasi';

    protected static ?string $title = 'Pengaturan Kebijakan Privasi';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string $settings = PageSettings::class;

    protected static ?string $cluster = PageSettingsCluster::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $old_files = app(PageSettings::class)->pp_meta_image;
        $new_files = $data['pp_meta_image'] ?? null;

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
                    ->description('Pengaturan meta tags untuk halaman kebijakan privasi.')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('pp_meta_title')
                            ->label('Title')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        TextInput::make('pp_meta_description')
                            ->label('Description')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        TextInput::make('pp_meta_keywords')
                            ->label('Keywords')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        FileUpload::make('pp_meta_image')
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
                    ->description('Pengaturan konten untuk halaman kebijakan privasi.')
                    ->columnSpanFull()
                    ->schema([
                        Section::make('Section Kebijakan Privasi')
                            ->description('Pengaturan pada section kebijakan privasi di halaman kebijakan privasi.')
                            ->columnSpanFull()
                            ->collapsible()
                            ->schema([
                                TextInput::make('pp_title')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                DatePicker::make('pp_updated_date')
                                    ->label('Tanggal Diperbarui')
                                    ->columnSpanFull()
                                    ->required(),
                                RichEditor::make('pp_content')
                                    ->label('Paragraf')
                                    ->toolbarButtons([
                                        ['bold', 'italic', 'underline', 'strike', 'subscript', 'superscript', 'link'],
                                        ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                                        ['bulletList', 'orderedList'],
                                        ['undo', 'redo'],
                                    ])
                                    ->columnSpanFull()
                                    ->required(),
                            ]),
                        Section::make('Section Penggunaan Cookies')
                            ->description('Pengaturan pada section penggunaan cookies di halaman kebijakan privasi.')
                            ->columnSpanFull()
                            ->collapsible()
                            ->schema([
                                TextInput::make('pp_title_cookie')
                                    ->label('Judul')
                                    ->autocomplete(false)
                                    ->columnSpanFull()
                                    ->required(),
                                DatePicker::make('pp_updated_date_cookie')
                                    ->label('Tanggal Diperbarui')
                                    ->columnSpanFull()
                                    ->required(),
                                RichEditor::make('pp_content_cookie')
                                    ->label('Paragraf')
                                    ->toolbarButtons([
                                        ['bold', 'italic', 'underline', 'strike', 'subscript', 'superscript', 'link'],
                                        ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                                        ['bulletList', 'orderedList'],
                                        ['undo', 'redo'],
                                    ])
                                    ->columnSpanFull()
                                    ->required(),
                            ])
                    ]),
            ]);
    }
}
