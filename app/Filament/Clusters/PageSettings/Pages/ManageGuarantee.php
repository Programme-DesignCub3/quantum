<?php

namespace App\Filament\Clusters\PageSettings\Pages;

use App\Constant\AcceptedFileConstant;
use App\Filament\Clusters\PageSettings\PageSettingsCluster;
use App\Settings\PageSettings;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Storage;
use UnitEnum;

class ManageGuarantee extends SettingsPage
{
    protected static ?int $navigationSort = 9;

    protected static string | UnitEnum | null $navigationGroup = 'Bantuan';

    protected static ?string $navigationLabel = 'Informasi Garansi';

    protected static ?string $title = 'Pengaturan Informasi Garansi';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string $settings = PageSettings::class;

    protected static ?string $cluster = PageSettingsCluster::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $old_files = app(PageSettings::class)->guarantee_meta_image;
        $new_files = $data['guarantee_meta_image'] ?? null;

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
                    ->description('Pengaturan meta tags untuk halaman informasi garansi.')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('guarantee_meta_title')
                            ->label('Title')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        TextInput::make('guarantee_meta_description')
                            ->label('Description')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        TextInput::make('guarantee_meta_keywords')
                            ->label('Keywords')
                            ->autocomplete(false)
                            ->columnSpanFull(),
                        FileUpload::make('guarantee_meta_image')
                            ->label('OG Image')
                            ->image()
                            ->acceptedFileTypes(AcceptedFileConstant::ACCEPTED_IMAGE)
                            ->maxFiles(1)
                            ->maxSize(2048)
                            ->directory('og-images')
                            ->columnSpanFull()
                            ->helperText('File berupa format gambar .jpeg .jpg .png .webp Maksimal ukuran file 2MB.')
                    ])
            ]);
    }
}
