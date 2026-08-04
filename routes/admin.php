<?php

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\PromoController as AdminPromoController;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;
use App\Http\Controllers\Admin\RestaurantProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Auth\AdminLoginController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    // Auth admin
    Route::middleware('guest')->group(function () {
        Route::get('login', [AdminLoginController::class, 'create'])->name('login');
        Route::post('login', [AdminLoginController::class, 'store']);
    });

    Route::post('logout', [AdminLoginController::class, 'destroy'])
        ->middleware('auth')
        ->name('logout');

    // Dashboard & CRUD lengkap (tahap Dashboard Admin)
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('menu', AdminMenuController::class)->except(['show']);
        Route::resource('kategori', AdminCategoryController::class)->except(['show']);
        Route::resource('promo', AdminPromoController::class)->except(['show']);
        Route::resource('galeri', AdminGalleryController::class)->except(['show']);
        Route::resource('artikel', AdminArticleController::class)->except(['show']);
        Route::resource('reservasi', AdminReservationController::class)->only(['index', 'show', 'update', 'destroy']);
        Route::resource('testimoni', AdminTestimonialController::class)->except(['show']);
        Route::resource('faq', AdminFaqController::class)->except(['show']);
        Route::resource('kontak', AdminContactController::class)->only(['index', 'show', 'destroy']);
        Route::resource('admin', AdminUserController::class)->except(['show']);

        Route::get('profil', [RestaurantProfileController::class, 'edit'])->name('profil.edit');
        Route::put('profil', [RestaurantProfileController::class, 'update'])->name('profil.update');

        Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit');
        Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
    });
});
