<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WasteKnowledge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WasteKnowledgeController extends Controller
{

    public function index()
    {
        $knowledge = WasteKnowledge::orderBy('kategori')->orderBy('jenis_sampah')->get();

        return view('admin.knowledge.index', compact('knowledge'));
    }


    public function create()
    {
        $kategori = ['organik' => 'Organik', 'anorganik' => 'Anorganik', 'b3' => 'B3'];
        return view('admin.knowledge.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_sampah' => 'required|string|max:255',
            'icon' => 'required|string|max:10',
            'ciri_tekstur' => 'required|string|max:255',
            'ciri_bau' => 'required|string|max:255',
            'ciri_asal' => 'required|string|max:255',
            'pengelolaan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'langkah_langkah' => 'required|array|min:1',
            'langkah_langkah.*' => 'required|string',
            'kategori' => 'required|in:organik,anorganik,b3'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $knowledge = WasteKnowledge::create([
            'jenis_sampah' => $request->jenis_sampah,
            'icon' => $request->icon,
            'ciri_ciri' => [
                'tekstur' => $request->ciri_tekstur,
                'bau' => $request->ciri_bau,
                'asal' => $request->ciri_asal
            ],
            'pengelolaan' => $request->pengelolaan,
            'deskripsi' => $request->deskripsi,
            'langkah_langkah' => $request->langkah_langkah,
            'kategori' => $request->kategori
        ]);

        return redirect()->route('admin.knowledge.index')
            ->with('success', 'Data pengetahuan berhasil ditambahkan!');
    }

    public function show(WasteKnowledge $knowledge)
    {
        return view('admin.knowledge.show', compact('knowledge'));
    }
    public function edit(WasteKnowledge $knowledge)
    {
        $kategori = ['organik' => 'Organik', 'anorganik' => 'Anorganik', 'b3' => 'B3'];
        return view('admin.knowledge.edit', compact('knowledge', 'kategori'));
    }

    public function update(Request $request, WasteKnowledge $knowledge)
    {
        $validator = Validator::make($request->all(), [
            'jenis_sampah' => 'required|string|max:255',
            'icon' => 'required|string|max:10',
            'ciri_tekstur' => 'required|string|max:255',
            'ciri_bau' => 'required|string|max:255',
            'ciri_asal' => 'required|string|max:255',
            'pengelolaan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'langkah_langkah' => 'required|array|min:1',
            'langkah_langkah.*' => 'required|string',
            'kategori' => 'required|in:organik,anorganik,b3'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $knowledge->update([
            'jenis_sampah' => $request->jenis_sampah,
            'icon' => $request->icon,
            'ciri_ciri' => [
                'tekstur' => $request->ciri_tekstur,
                'bau' => $request->ciri_bau,
                'asal' => $request->ciri_asal
            ],
            'pengelolaan' => $request->pengelolaan,
            'deskripsi' => $request->deskripsi,
            'langkah_langkah' => $request->langkah_langkah,
            'kategori' => $request->kategori
        ]);

        return redirect()->route('admin.knowledge.index')
            ->with('success', 'Data pengetahuan berhasil diperbarui!');
    }


    public function destroy(WasteKnowledge $knowledge)
    {
        $knowledge->delete();

        return redirect()->route('admin.knowledge.index')
            ->with('success', 'Data pengetahuan berhasil dihapus!');
    }


    public function toggleStatus(WasteKnowledge $knowledge)
    {
        $knowledge->update([
            'aktif' => !$knowledge->aktif
        ]);

        $status = $knowledge->aktif ? 'diaktifkan' : 'dinonaktifkan';

        return redirect()->route('admin.knowledge.index')
            ->with('success', "Data pengetahuan berhasil $status!");
    }
}
