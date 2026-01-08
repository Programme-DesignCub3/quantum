<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        // Social Media
        $this->migrator->add('general.linkedin_url', 'https://www.linkedin.com/company/quantum-home-appliances');
        $this->migrator->add('general.facebook_url', 'https://www.facebook.com/QuantumIDN');
        $this->migrator->add('general.youtube_url', 'https://www.youtube.com/@quantumindonesia');
        $this->migrator->add('general.instagram_url', 'https://www.instagram.com/quantum_indonesia');
        $this->migrator->add('general.tiktok_url', 'https://www.tiktok.com/@quantum_indonesia');

        // Contact Information
        $this->migrator->add('general.phone_number', '');
        $this->migrator->add('general.email_address', '');
        $this->migrator->add('general.whatsapp_number', '');
        $this->migrator->add('general.customer_care', '');
    }
};
