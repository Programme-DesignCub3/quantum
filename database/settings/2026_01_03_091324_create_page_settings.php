<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        // Home Page
        $this->migrator->add('page.home_meta_title', null);
        $this->migrator->add('page.home_meta_description', null);
        $this->migrator->add('page.home_meta_keywords', null);
        $this->migrator->add('page.home_meta_image', null);
        $this->migrator->add('page.home_banner', []);
        $this->migrator->add('page.home_testimonials', []);

        // About Page
        $this->migrator->add('page.about_meta_title', null);
        $this->migrator->add('page.about_meta_description', null);
        $this->migrator->add('page.about_meta_keywords', null);
        $this->migrator->add('page.about_meta_image', null);

        // Product Page
        $this->migrator->add('page.product_meta_title', null);
        $this->migrator->add('page.product_meta_description', null);
        $this->migrator->add('page.product_meta_keywords', null);
        $this->migrator->add('page.product_meta_image', null);

        // Distributor Page
        $this->migrator->add('page.distributor_meta_title', null);
        $this->migrator->add('page.distributor_meta_description', null);
        $this->migrator->add('page.distributor_meta_keywords', null);
        $this->migrator->add('page.distributor_meta_image', null);

        // Catalog Page
        $this->migrator->add('page.catalog_meta_title', null);
        $this->migrator->add('page.catalog_meta_description', null);
        $this->migrator->add('page.catalog_meta_keywords', null);
        $this->migrator->add('page.catalog_meta_image', null);

        // News and Event (Articles) Page
        $this->migrator->add('page.news_meta_title', null);
        $this->migrator->add('page.news_meta_description', null);
        $this->migrator->add('page.news_meta_keywords', null);
        $this->migrator->add('page.news_meta_image', null);

        // Recipe Page
        $this->migrator->add('page.recipe_meta_title', null);
        $this->migrator->add('page.recipe_meta_description', null);
        $this->migrator->add('page.recipe_meta_keywords', null);
        $this->migrator->add('page.recipe_meta_image', null);

        // Customer Service Page
        $this->migrator->add('page.cs_meta_title', null);
        $this->migrator->add('page.cs_meta_description', null);
        $this->migrator->add('page.cs_meta_keywords', null);
        $this->migrator->add('page.cs_meta_image', null);

        // Guarantee Information Page
        $this->migrator->add('page.guarantee_meta_title', null);
        $this->migrator->add('page.guarantee_meta_description', null);
        $this->migrator->add('page.guarantee_meta_keywords', null);
        $this->migrator->add('page.guarantee_meta_image', null);

        // Service Center Page
        $this->migrator->add('page.sc_meta_title', null);
        $this->migrator->add('page.sc_meta_description', null);
        $this->migrator->add('page.sc_meta_keywords', null);
        $this->migrator->add('page.sc_meta_image', null);

        // FAQ Page
        $this->migrator->add('page.faq_meta_title', null);
        $this->migrator->add('page.faq_meta_description', null);
        $this->migrator->add('page.faq_meta_keywords', null);
        $this->migrator->add('page.faq_meta_image', null);

        // Contact Page
        $this->migrator->add('page.contact_meta_title', null);
        $this->migrator->add('page.contact_meta_description', null);
        $this->migrator->add('page.contact_meta_keywords', null);
        $this->migrator->add('page.contact_meta_image', null);

        // Education & Guidance Page
        $this->migrator->add('page.guidance_meta_title', null);
        $this->migrator->add('page.guidance_meta_description', null);
        $this->migrator->add('page.guidance_meta_keywords', null);
        $this->migrator->add('page.guidance_meta_image', null);

        // Video & Tutorial Page
        $this->migrator->add('page.video_meta_title', null);
        $this->migrator->add('page.video_meta_description', null);
        $this->migrator->add('page.video_meta_keywords', null);
        $this->migrator->add('page.video_meta_image', null);

        // Terms & Conditions Page
        $this->migrator->add('page.tnc_meta_title', null);
        $this->migrator->add('page.tnc_meta_description', null);
        $this->migrator->add('page.tnc_meta_keywords', null);
        $this->migrator->add('page.tnc_meta_image', null);

        // Privacy Policy Page
        $this->migrator->add('page.pp_meta_title', null);
        $this->migrator->add('page.pp_meta_description', null);
        $this->migrator->add('page.pp_meta_keywords', null);
        $this->migrator->add('page.pp_meta_image', null);
    }
};
