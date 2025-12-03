<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GuidanceController;
use App\Http\Controllers\NewsEventController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\TutorialVideoController;
use App\Http\Controllers\CustomerServiceController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TermsConditionsController;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// About
Route::get('/tentang', [AboutController::class, 'index'])->name('about');

// Product
Route::prefix('produk')->name('product')->group(function () {
    Route::controller(ProductController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/{category}', 'category')->name('.category');
        Route::get('/{category}/{slug}', 'detail')->name('.detail');
    });
});

// Distributor
Route::name('distributor')->group(function () {
    Route::get('/katalog', [CatalogController::class, 'index'])->name('.catalog');
    Route::get('/distributor', [DistributorController::class, 'index'])->name('.list-distributor');
});

// Updates
Route::name('updates')->group(function () {
    Route::prefix('berita-dan-event')->name('.news')->group(function () {
        Route::controller(NewsEventController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('/{slug}', 'detail')->name('.detail');
        });
    });
    Route::prefix('resep')->name('.recipe')->group(function () {
        Route::controller(RecipeController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('/{slug}', 'detail')->name('.detail');
        });
    });
});

// Support
Route::name('support')->group(function () {
    // (Customer Service)
    Route::get('/layanan-pelanggan', [CustomerServiceController::class, 'index'])->name('.customer-service');
    // (FAQ)
    Route::get('/faq', [FaqController::class, 'index'])->name('.faq');
    // (Contact)
    Route::get('/kontak', [ContactController::class, 'index'])->name('.contact');
    // (Video & Tutorial)
    Route::get('/tutorial-video', [TutorialVideoController::class, 'index'])->name('.tutorial-video');
    // (Education & Guidance)
    Route::prefix('edukasi-dan-panduan')->name('.guidance')->group(function () {
        Route::controller(GuidanceController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('/{slug}', 'detail')->name('.detail');
        });
    });
});

// Terms and Conditions
Route::get('/syarat-dan-ketentuan', [TermsConditionsController::class, 'index'])->name('terms-conditions');

// Privacy Policy
Route::get('/kebijakan-privasi', [PrivacyPolicyController::class, 'index'])->name('privacy-policy');

// Search
Route::get('/search', [SearchController::class, 'index'])->name('search');
