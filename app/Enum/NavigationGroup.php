<?php

namespace App\Enum;

use Filament\Support\Contracts\HasLabel;

enum NavigationGroup implements HasLabel
{
    // case Product;
    case NewsEvent;

    public function getLabel(): string
    {
        return match ($this) {
            self::NewsEvent => 'Manajemen Berita dan Event',
        };
    }
}
