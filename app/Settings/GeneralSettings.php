<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public array $operational_hours;
    public string $footer_description;

    public static function group(): string
    {
        return 'general';
    }
}
