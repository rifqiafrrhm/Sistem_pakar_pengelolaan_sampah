<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ExpertSystemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\WasteKnowledgeController;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/edukasi', [PageController::class, 'edukasi'])->name('edukasi');
Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');

Route::get('/konsultasi', [ExpertSystemController::class, 'konsultasi'])->name('konsultasi');
Route::post('/konsultasi', [ExpertSystemController::class, 'konsultasi']);
Route::post('/kontak', [PageController::class, 'kontakStore'])->name('kontak.submit');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('knowledge', WasteKnowledgeController::class);

    Route::post('knowledge/{knowledge}/toggle-status', [WasteKnowledgeController::class, 'toggleStatus'])
         ->name('knowledge.toggle-status');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
