<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    // Social Media
    public string $linkedin_url;
    public string $facebook_url;
    public string $youtube_url;
    public string $instagram_url;
    public string $tiktok_url;

    // Contact Information
    public string $phone_number;
    public string $email_address;
    public string $whatsapp_number;
    public string $customer_care;

    public static function group(): string
    {
        return 'general';
    }
}
