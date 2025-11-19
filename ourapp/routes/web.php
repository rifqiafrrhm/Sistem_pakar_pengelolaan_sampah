<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ExpertSystemController;
use Illuminate\Support\Facades\Route;

// Halaman Statis
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/edukasi', [PageController::class, 'edukasi'])->name('edukasi');
Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');

// Sistem Pakar Konsultasi
Route::get('/konsultasi', [ExpertSystemController::class, 'konsultasi'])->name('konsultasi');
Route::post('/konsultasi', [ExpertSystemController::class, 'konsultasi']);
