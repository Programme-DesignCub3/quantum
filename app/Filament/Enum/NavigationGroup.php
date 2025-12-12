<?php

namespace App\Filament\Enum;

use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum NavigationGroup implements HasLabel, HasIcon
{
    case Product;

    public function getLabel(): string
    {
        return match ($this) {
            self::Product => 'Manajemen Produk',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Product => 'heroicon-o-shopping-bag',
        };
    }
}
