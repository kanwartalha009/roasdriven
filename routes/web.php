<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WorkController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/services',          [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}',   [ServiceController::class, 'show'])->name('services.show');

Route::get('/work',          [WorkController::class, 'index'])->name('work.index');
Route::get('/work/{slug}',   [WorkController::class, 'show'])->name('work.show');

Route::get('/about',   [AboutController::class, 'index'])->name('about');
Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');

Route::get('/journal',          [JournalController::class, 'index'])->name('journal.index');
Route::get('/journal/{slug}',   [JournalController::class, 'show'])->name('journal.show');

Route::get('/book',  [BookController::class, 'show'])->name('book');
Route::post('/book', [BookController::class, 'store'])->name('book.store');

Route::get('/legal/privacy', [LegalController::class, 'privacy'])->name('legal.privacy');
Route::get('/legal/terms',   [LegalController::class, 'terms'])->name('legal.terms');
Route::get('/legal/cookies', [LegalController::class, 'cookies'])->name('legal.cookies');
