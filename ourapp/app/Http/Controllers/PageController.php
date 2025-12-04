<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\PesanKontak;
class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function edukasi()
    {
        return view('edukasi');
    }

    public function tentang()
    {
        return view('tentang');
    }

    public function kontak()
    {
        return view('kontak');
    }

    public function kontakStore(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'subjek' => 'required|string',
            'pesan' => 'required|string|min:10'
        ]);


        \Log::info('Pesan kontak baru diterima', $validated);

        return redirect()->route('kontak')
                         ->with('success', 'Pesan Anda telah berhasil dikirim! Kami akan merespons dalam 1-2 hari kerja.');
    }


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
