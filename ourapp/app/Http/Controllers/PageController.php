<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\PesanKontak; // Opsional, jika menggunakan database

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

    // Halaman Kontak - Tampilkan Form
    public function kontak()
    {
        return view('kontak');
    }

    // Proses Form Kontak - Store
    public function kontakStore(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'subjek' => 'required|string',
            'pesan' => 'required|string|min:10'
        ]);

        // Opsional: Simpan ke database jika menggunakan model PesanKontak
        // try {
        //     PesanKontak::create($validated);
        //     \Log::info('Pesan kontak baru berhasil disimpan', $validated);
        // } catch (\Exception $e) {
        //     \Log::error('Gagal menyimpan pesan kontak: ' . $e->getMessage());
        //     return redirect()->route('kontak')->with('error', 'Maaf, terjadi kesalahan. Silakan coba lagi.');
        // }

        // Opsional: Kirim email notifikasi
        // $this->kirimEmailNotifikasi($validated);

        // Log pesan (minimal)
        \Log::info('Pesan kontak baru diterima', $validated);

        return redirect()->route('kontak')
                         ->with('success', 'Pesan Anda telah berhasil dikirim! Kami akan merespons dalam 1-2 hari kerja.');
    }

    /**
     * Method untuk mengirim email notifikasi (opsional)
     */
    private function kirimEmailNotifikasi($data)
    {
        try {
            Mail::send('emails.notifikasi-kontak', $data, function($message) use ($data) {
                $message->to('developer@ecowaste.com')
                        ->subject('Pesan Kontak Baru: ' . $data['subjek'])
                        ->replyTo($data['email'], $data['nama']);
            });
        } catch (\Exception $e) {
            \Log::error('Gagal mengirim email notifikasi: ' . $e->getMessage());
        }
    }
}
