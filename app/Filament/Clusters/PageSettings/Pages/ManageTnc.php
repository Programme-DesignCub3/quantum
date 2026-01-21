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

class ManageTnc extends SettingsPage
{
    protected static ?int $navigationSort = 15;

    protected static string | UnitEnum | null $navigationGroup = 'Lainnya';

    protected static ?string $navigationLabel = 'Syarat dan Ketentuan';

    protected static ?string $title = 'Pengaturan Syarat dan Ketentuan';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string $settings = PageSettings::class;

    protected static ?string $cluster = PageSettingsCluster::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $old_files = app(PageSettings::class)->tnc_meta_image;
        $new_files = $data['tnc_meta_image'] ?? null;

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
                    ->description('Pengaturan meta tags untuk halaman syarat dan ketentuan.')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('tnc_meta_title')
                            ->label('Title')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        TextInput::make('tnc_meta_description')
                            ->label('Description')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        TextInput::make('tnc_meta_keywords')
                            ->label('Keywords')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        FileUpload::make('tnc_meta_image')
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
                    ->description('Pengaturan konten untuk halaman syarat dan ketentuan.')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('tnc_title')
                            ->label('Judul')
                            ->autocomplete(false)
                            ->columnSpanFull()
                            ->required(),
                        DatePicker::make('tnc_updated_date')
                            ->label('Tanggal Diperbarui')
                            ->columnSpanFull()
                            ->required(),
                        RichEditor::make('tnc_content')
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
            ]);
    }
}
