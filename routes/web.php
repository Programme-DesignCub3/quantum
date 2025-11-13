<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerServiceController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\TermsConditionsController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// About
Route::get('/tentang', [AboutController::class, 'index'])->name('about');

// Product
Route::prefix('produk')->group(function () {
    Route::controller(ProductController::class)->group(function () {
        Route::get('/', 'index')->name('product');
        Route::get('/{category}', 'category')->name('product.category');
        Route::get('/{category}/{slug}', 'detail')->name('product.detail');
    });
});

// Customer Service
Route::get('/layanan-pelanggan', [CustomerServiceController::class, 'index'])->name('customer-service');

// FAQ
Route::get('/faq', [FaqController::class, 'index'])->name('faq');

// Contact
Route::get('/kontak', [ContactController::class, 'index'])->name('contact');

// Terms and Conditions
Route::get('/syarat-dan-ketentuan', [TermsConditionsController::class, 'index'])->name('terms-conditions');

// Privacy Policy
Route::get('/kebijakan-privasi', [PrivacyPolicyController::class, 'index'])->name('privacy-policy');
