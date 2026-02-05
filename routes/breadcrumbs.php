<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Beranda
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Beranda', route('home'));
});

// Beranda > Tentang
Breadcrumbs::for('about', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Tentang', route('about'));
});

// Beranda > Produk
Breadcrumbs::for('product', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Produk', route('product'));
});

// Beranda > Produk > [Kategori]
Breadcrumbs::for('product.category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('home');
    $trail->push($category->name, route('product.category', $category->slug));
});

// Beranda > Produk > [Kategori] > [Detail Produk]
Breadcrumbs::for('product.detail', function (BreadcrumbTrail $trail, $category, $slug) {
    $trail->parent('product.category', $category->category);
    $trail->push($slug->variant->name . ' ' . $slug->name, route('product.detail', [$category->category->slug, $slug->slug]));
});

// Beranda > Distributor
Breadcrumbs::for('distributor.list-distributor', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Distributor', route('distributor.list-distributor'));
});

// Beranda > Katalog
Breadcrumbs::for('distributor.catalog', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Katalog', route('distributor.catalog'));
});

// Beranda > Berita dan Event
Breadcrumbs::for('updates.news', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Berita dan Event', route('updates.news'));
});

// Beranda > Berita dan Event > [Detail Berita]
Breadcrumbs::for('updates.news.detail', function (BreadcrumbTrail $trail, $slug) {
    $trail->parent('updates.news');
    $trail->push($slug->title, route('updates.news.detail', $slug->slug));
});

// Beranda > Resep
Breadcrumbs::for('updates.recipe', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Resep', route('updates.recipe'));
});

// Beranda > Resep > [Detail Resep]
Breadcrumbs::for('updates.recipe.detail', function (BreadcrumbTrail $trail, $slug) {
    $trail->parent('updates.recipe');
    $trail->push($slug->title, route('updates.recipe.detail', $slug->slug));
});

// Beranda > Layanan Pelanggan
Breadcrumbs::for('support.customer-service', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Layanan Pelanggan', route('support.customer-service'));
});

// Beranda > Garansi
Breadcrumbs::for('support.guarantee-information', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Garansi', route('support.guarantee-information'));
});

// Beranda > Garansi > Terima Kasih
Breadcrumbs::for('support.guarantee-information.registration-success', function (BreadcrumbTrail $trail) {
    $trail->parent('support.guarantee-information');
    $trail->push('Terima Kasih', route('support.guarantee-information.registration-success'));
});

// Beranda > Service Center
Breadcrumbs::for('support.service-center', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Service Center', route('support.service-center'));
});

// Beranda > FAQ
Breadcrumbs::for('support.faq', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('FAQ', route('support.faq'));
});

// Beranda > Kontak
Breadcrumbs::for('support.contact', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Kontak', route('support.contact'));
});

// Beranda > Edukasi dan Panduan
Breadcrumbs::for('support.guidance', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Edukasi dan Panduan', route('support.guidance'));
});

// Beranda > Edukasi dan Panduan > [Detail Panduan]
Breadcrumbs::for('support.guidance.detail', function (BreadcrumbTrail $trail, $slug) {
    $trail->parent('support.guidance');
    $trail->push($slug->title, route('support.guidance.detail', $slug->slug));
});

// Beranda > Tutorial Video
Breadcrumbs::for('support.tutorial-video', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Tutorial Video', route('support.tutorial-video'));
});

// Beranda > Syarat & Ketentuan
Breadcrumbs::for('terms-conditions', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Syarat & Ketentuan', route('terms-conditions'));
});

// Beranda > Kebijakan Privasi
Breadcrumbs::for('privacy-policy', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Kebijakan Privasi', route('privacy-policy'));
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
