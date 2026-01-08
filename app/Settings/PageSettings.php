<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class PageSettings extends Settings
{
    // Home Page
    public ?string $home_meta_title;
    public ?string $home_meta_description;
    public ?string $home_meta_keywords;
    public ?string $home_meta_image;
    public array $home_banner;
    public array $home_testimonials;

    // About Page
    public ?string $about_meta_title;
    public ?string $about_meta_description;
    public ?string $about_meta_keywords;
    public ?string $about_meta_image;

    // Product Page
    public ?string $product_meta_title;
    public ?string $product_meta_description;
    public ?string $product_meta_keywords;
    public ?string $product_meta_image;

    // Distributor Page
    public ?string $distributor_meta_title;
    public ?string $distributor_meta_description;
    public ?string $distributor_meta_keywords;
    public ?string $distributor_meta_image;

    // Catalog Page
    public ?string $catalog_meta_title;
    public ?string $catalog_meta_description;
    public ?string $catalog_meta_keywords;
    public ?string $catalog_meta_image;

    // News and Event (Articles) Page
    public ?string $news_meta_title;
    public ?string $news_meta_description;
    public ?string $news_meta_keywords;
    public ?string $news_meta_image;

    // Recipe Page
    public ?string $recipe_meta_title;
    public ?string $recipe_meta_description;
    public ?string $recipe_meta_keywords;
    public ?string $recipe_meta_image;

    // Customer Service Page
    public ?string $cs_meta_title;
    public ?string $cs_meta_description;
    public ?string $cs_meta_keywords;
    public ?string $cs_meta_image;

    // Guarantee Information Page
    public ?string $guarantee_meta_title;
    public ?string $guarantee_meta_description;
    public ?string $guarantee_meta_keywords;
    public ?string $guarantee_meta_image;

    // Service Center Page
    public ?string $sc_meta_title;
    public ?string $sc_meta_description;
    public ?string $sc_meta_keywords;
    public ?string $sc_meta_image;

    // FAQ Page
    public ?string $faq_meta_title;
    public ?string $faq_meta_description;
    public ?string $faq_meta_keywords;
    public ?string $faq_meta_image;

    // Contact Page
    public ?string $contact_meta_title;
    public ?string $contact_meta_description;
    public ?string $contact_meta_keywords;
    public ?string $contact_meta_image;

    // Education & Guidance Page
    public ?string $guidance_meta_title;
    public ?string $guidance_meta_description;
    public ?string $guidance_meta_keywords;
    public ?string $guidance_meta_image;

    // Video & Tutorial Page
    public ?string $video_meta_title;
    public ?string $video_meta_description;
    public ?string $video_meta_keywords;
    public ?string $video_meta_image;

    // Terms & Conditions Page
    public ?string $tnc_meta_title;
    public ?string $tnc_meta_description;
    public ?string $tnc_meta_keywords;
    public ?string $tnc_meta_image;

    // Privacy Policy Page
    public ?string $pp_meta_title;
    public ?string $pp_meta_description;
    public ?string $pp_meta_keywords;
    public ?string $pp_meta_image;

    public static function group(): string
    {
        return 'page';
    }
}
