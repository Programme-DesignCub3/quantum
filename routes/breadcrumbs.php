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

// Beranda > Layanan Pelanggan
Breadcrumbs::for('customer-service', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Layanan Pelanggan', route('customer-service'));
});

// Beranda > FAQ
Breadcrumbs::for('faq', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('FAQ', route('faq'));
});

// Beranda > Kontak
Breadcrumbs::for('contact', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Kontak', route('contact'));
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
