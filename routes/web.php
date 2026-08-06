<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang', [HomeController::class, 'about'])->name('about');

Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/{slug}', [MenuController::class, 'show'])->name('menu.show');

Route::get('/promo', [PromoController::class, 'index'])->name('promo.index');
Route::get('/promo/{slug}', [PromoController::class, 'show'])->name('promo.show');

Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery.index');

Route::get('/artikel', [ArticleController::class, 'index'])->name('article.index');
Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('article.show');

Route::get('/reservasi', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/reservasi', [ReservationController::class, 'store'])->name('reservation.store');

Route::get('/kontak', [ContactController::class, 'create'])->name('contact.create');
Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store');