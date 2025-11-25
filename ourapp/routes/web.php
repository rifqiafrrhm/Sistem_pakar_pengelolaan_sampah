<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ExpertSystemController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/edukasi', [PageController::class, 'edukasi'])->name('edukasi');
Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');

Route::get('/konsultasi', [ExpertSystemController::class, 'konsultasi'])->name('konsultasi');
Route::post('/konsultasi', [ExpertSystemController::class, 'konsultasi']);
Route::post('/kontak', [PageController::class, 'kontakStore'])->name('kontak.submit');
