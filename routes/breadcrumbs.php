<?php

use App\Settings\PageSettings;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

$pageSettings = app(PageSettings::class);

// Beranda
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Beranda', route('home'));
});

// Beranda > Tentang
Breadcrumbs::for('about', function (BreadcrumbTrail $trail) use ($pageSettings) {
    $trail->parent('home');
    if ($pageSettings->about_is_active === 'false') {
        $trail->push('404');
    } else {
        $trail->push('Tentang', route('about'));
    }
});

// Beranda > Produk
Breadcrumbs::for('product', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Produk', route('product'));
});

// Beranda > Produk > [Kategori]
Breadcrumbs::for('product.category', function (BreadcrumbTrail $trail, $category = null) {
    $trail->parent('home');
    if($category) {
        $trail->push($category->name, route('product.category', $category->slug));
    } else {
        $trail->push('404');
    }
});

// Beranda > Produk > [Kategori] > [Detail Produk]
Breadcrumbs::for('product.detail', function (BreadcrumbTrail $trail, $category = null, $slug = null) {
    if($slug) {
        $trail->parent('product.category', $category->category);
        $trail->push($slug->variant->name . ' ' . $slug->name, route('product.detail', [$category->category->slug, $slug->slug]));
    } else {
        $trail->parent('home');
        $trail->push('404');
    }
});

// Beranda > Distributor
Breadcrumbs::for('distributor.list-distributor', function (BreadcrumbTrail $trail) use ($pageSettings) {
    $trail->parent('home');
    if ($pageSettings->distributor_is_active === 'false') {
        $trail->push('404');
    } else {
        $trail->push('Distributor', route('distributor.list-distributor'));
    }
});

// Beranda > Katalog
Breadcrumbs::for('distributor.catalog', function (BreadcrumbTrail $trail) use ($pageSettings) {
    $trail->parent('home');
    if ($pageSettings->catalog_is_active === 'false') {
        $trail->push('404');
    } else {
        $trail->push('Katalog', route('distributor.catalog'));
    }
});

// Beranda > Berita dan Event
Breadcrumbs::for('updates.news', function (BreadcrumbTrail $trail) use ($pageSettings) {
    $trail->parent('home');
    if ($pageSettings->news_is_active === 'false') {
        $trail->push('404');
    } else {
        $trail->push('Berita dan Event', route('updates.news'));
    }
});

// Beranda > Berita dan Event > [Detail Berita]
Breadcrumbs::for('updates.news.detail', function (BreadcrumbTrail $trail, $slug = null) {
    if($slug) {
        $trail->parent('updates.news');
        $trail->push($slug->title, route('updates.news.detail', $slug->slug));
    } else {
        $trail->parent('home');
        $trail->push('404');
    }
});

// Beranda > Resep
Breadcrumbs::for('updates.recipe', function (BreadcrumbTrail $trail) use ($pageSettings) {
    $trail->parent('home');
    if ($pageSettings->recipe_is_active === 'false') {
        $trail->push('404');
    } else {
        $trail->push('Resep', route('updates.recipe'));
    }
});

// Beranda > Resep > [Detail Resep]
Breadcrumbs::for('updates.recipe.detail', function (BreadcrumbTrail $trail, $slug = null) {
    if($slug) {
        $trail->parent('updates.recipe');
        $trail->push($slug->title, route('updates.recipe.detail', $slug->slug));
    } else {
        $trail->parent('home');
        $trail->push('404');
    }
});

// Beranda > Layanan Pelanggan
Breadcrumbs::for('support.customer-service', function (BreadcrumbTrail $trail) use ($pageSettings) {
    $trail->parent('home');
    if ($pageSettings->cs_is_active === 'false') {
        $trail->push('404');
    } else {
        $trail->push('Layanan Pelanggan', route('support.customer-service'));
    }
});

// Beranda > Garansi
Breadcrumbs::for('support.guarantee-information', function (BreadcrumbTrail $trail) use ($pageSettings) {
    $trail->parent('home');
    if ($pageSettings->guarantee_is_active === 'false') {
        $trail->push('404');
    } else {
        $trail->push('Garansi', route('support.guarantee-information'));
    }
});

// Beranda > Garansi > Terima Kasih
Breadcrumbs::for('support.guarantee-information.registration-success', function (BreadcrumbTrail $trail) {
    $trail->parent('support.guarantee-information');
    $trail->push('Terima Kasih', route('support.guarantee-information.registration-success'));
});

// Beranda > Service Center
Breadcrumbs::for('support.service-center', function (BreadcrumbTrail $trail) use ($pageSettings) {
    $trail->parent('home');
    if ($pageSettings->sc_is_active === 'false') {
        $trail->push('404');
    } else {
        $trail->push('Service Center', route('support.service-center'));
    }
});

// Beranda > FAQ
Breadcrumbs::for('support.faq', function (BreadcrumbTrail $trail) use ($pageSettings) {
    $trail->parent('home');
    if ($pageSettings->faq_is_active === 'false') {
        $trail->push('404');
    } else {
        $trail->push('FAQ', route('support.faq'));
    }
});

// Beranda > Kontak
Breadcrumbs::for('support.contact', function (BreadcrumbTrail $trail) use ($pageSettings) {
    $trail->parent('home');
    if ($pageSettings->contact_is_active === 'false') {
        $trail->push('404');
    } else {
        $trail->push('Kontak', route('support.contact'));
    }
});

// Beranda > Edukasi dan Panduan
Breadcrumbs::for('support.guidance', function (BreadcrumbTrail $trail) use ($pageSettings) {
    $trail->parent('home');
    if ($pageSettings->guidance_is_active === 'false') {
        $trail->push('404');
    } else {
        $trail->push('Edukasi dan Panduan', route('support.guidance'));
    }
});

// Beranda > Edukasi dan Panduan > [Detail Panduan]
Breadcrumbs::for('support.guidance.detail', function (BreadcrumbTrail $trail, $slug = null) {
    if($slug) {
        $trail->parent('support.guidance');
        $trail->push($slug->title, route('support.guidance.detail', $slug->slug));
    } else {
        $trail->parent('home');
        $trail->push('404');
    }
});

// Beranda > Tutorial Video
Breadcrumbs::for('support.tutorial-video', function (BreadcrumbTrail $trail) use ($pageSettings) {
    $trail->parent('home');
    if ($pageSettings->video_is_active === 'false') {
        $trail->push('404');
    } else {
        $trail->push('Tutorial Video', route('support.tutorial-video'));
    }
});

// Beranda > Syarat & Ketentuan
Breadcrumbs::for('terms-conditions', function (BreadcrumbTrail $trail) use ($pageSettings) {
    $trail->parent('home');
    if ($pageSettings->tnc_is_active === 'false') {
        $trail->push('404');
    } else {
        $trail->push('Syarat & Ketentuan', route('terms-conditions'));
    }
});

// Beranda > Kebijakan Privasi
Breadcrumbs::for('privacy-policy', function (BreadcrumbTrail $trail) use ($pageSettings) {
    $trail->parent('home');
    if ($pageSettings->pp_is_active === 'false') {
        $trail->push('404');
    } else {
        $trail->push('Kebijakan Privasi', route('privacy-policy'));
    }
});

// Search Page
Breadcrumbs::for('search', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Search Result', route('search'));
});

// 404 Error Page
Breadcrumbs::for('errors.404', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('404');
});
