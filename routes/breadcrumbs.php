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

// Beranda > [Kategori]
Breadcrumbs::for('product.category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('home');
    $trail->push($category, route('product.category', $category));
});

// Beranda > [Kategori] > [Detail Produk]
Breadcrumbs::for('product.detail', function (BreadcrumbTrail $trail, $category, $slug) {
    $trail->parent('product.category', $category);
    $trail->push($slug, route('product.detail', [$category, $slug]));
});

// Beranda > Berita dan Event
Breadcrumbs::for('updates.news', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Berita dan Event', route('updates.news'));
});

// Beranda > Berita dan Event > [Detail Berita]
Breadcrumbs::for('updates.news.detail', function (BreadcrumbTrail $trail, $slug) {
    $trail->parent('updates.news');
    $trail->push($slug, route('updates.news.detail', $slug));
});

// Beranda > Layanan Pelanggan
Breadcrumbs::for('support.customer-service', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Layanan Pelanggan', route('support.customer-service'));
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
    $trail->push($slug, route('support.guidance.detail', $slug));
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

// 404 Error Page
Breadcrumbs::for('errors.404', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('404');
});
