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
    public string $home_title_banner;
    public string $home_title_product;
    public string $home_title_why;
    public string $home_title_testimonial;
    public string $home_title_article;
    public string $home_title_banner_bottom;
    public string $home_description_banner;
    public string $home_description_product;
    public string $home_description_why;
    public string $home_description_banner_bottom;
    public array $home_banner;
    public array $home_why_choose_us;
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
    public string $cs_title;
    public string $cs_title_support;
    public string $cs_title_guidance;
    public string $cs_title_video;
    public string $cs_description;
    public string $cs_description_support;
    public string $cs_description_guidance;
    public string $cs_description_video;
    public array $cs_support;

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
    public string $sc_title;
    public string $sc_description;

    // FAQ Page
    public ?string $faq_meta_title;
    public ?string $faq_meta_description;
    public ?string $faq_meta_keywords;
    public ?string $faq_meta_image;
    public string $faq_title;
    public string $faq_description;
    public string $faq_sub_title_product;
    public string $faq_sub_title_purchase;
    public string $faq_sub_title_guarantee;
    public array $faq_product;
    public array $faq_purchase;
    public array $faq_guarantee;

    // Contact Page
    public ?string $contact_meta_title;
    public ?string $contact_meta_description;
    public ?string $contact_meta_keywords;
    public ?string $contact_meta_image;
    public string $contact_title;
    public string $contact_title_service;
    public string $contact_description;
    public string $contact_description_service;
    public string $contact_cc_number;
    public array $contact_cc_operational;
    public string $contact_cc_information;
    public string $contact_wa_number;
    public array $contact_wa_operational;
    public string $contact_wa_information;
    public string $contact_email;
    public array $contact_email_operational;
    public string $contact_email_information;
    public ?string $contact_office_image;
    public string $contact_office_name;
    public string $contact_office_address;
    public array $contact_office_operational;
    public string $contact_office_information;
    public string $contact_office_map;
    public array $contact_socmed_operational;
    public string $contact_socmed_information;
    public string $contact_socmed_tiktok;
    public string $contact_socmed_linkedin;
    public string $contact_socmed_youtube;
    public string $contact_socmed_instagram;
    public string $contact_socmed_facebook;

    // Education & Guidance Page
    public ?string $guidance_meta_title;
    public ?string $guidance_meta_description;
    public ?string $guidance_meta_keywords;
    public ?string $guidance_meta_image;
    public string $guidance_title;
    public string $guidance_title_article;
    public string $guidance_description;
    public string $guidance_description_article;

    // Video & Tutorial Page
    public ?string $video_meta_title;
    public ?string $video_meta_description;
    public ?string $video_meta_keywords;
    public ?string $video_meta_image;
    public string $video_title;
    public string $video_description;

    // Terms & Conditions Page
    public ?string $tnc_meta_title;
    public ?string $tnc_meta_description;
    public ?string $tnc_meta_keywords;
    public ?string $tnc_meta_image;
    public string $tnc_title;
    public string $tnc_updated_date;
    public string $tnc_content;

    // Privacy Policy Page
    public ?string $pp_meta_title;
    public ?string $pp_meta_description;
    public ?string $pp_meta_keywords;
    public ?string $pp_meta_image;
    public string $pp_title;
    public string $pp_title_cookie;
    public string $pp_updated_date;
    public string $pp_updated_date_cookie;
    public string $pp_content;
    public string $pp_content_cookie;

    public static function group(): string
    {
        return 'page';
    }
}
