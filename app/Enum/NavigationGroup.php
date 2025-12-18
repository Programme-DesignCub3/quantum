<?php

namespace App\Enum;

use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum NavigationGroup implements HasLabel, HasIcon
{
    case Product;
    case NewsEvent;

    public function getLabel(): string
    {
        return match ($this) {
            self::Product => 'Manajemen Produk',
            self::NewsEvent => 'Manajemen Berita dan Event',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Product => 'heroicon-o-shopping-bag',
            self::NewsEvent => 'heroicon-o-newspaper',
        };
    }
}
