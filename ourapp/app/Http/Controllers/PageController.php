<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Halaman Home
    public function home()
    {
        return view('home');
    }

    // Halaman Edukasi
    public function edukasi()
    {
        return view('edukasi');
    }

    // Halaman Tentang
    public function tentang()
    {
        return view('tentang');
    }

    // Halaman Kontak
    public function kontak()
    {
        return view('kontak');
    }
}
