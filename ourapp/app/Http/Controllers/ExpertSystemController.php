<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WasteKnowledge;

class ExpertSystemController extends Controller
{
    // Pertanyaan Sistem Pakar (tetap sama)
    private $questions = [
        [
            'id' => 'q1',
            'question' => 'Dari mana asal sampah Anda?',
            'options' => [
                ['value' => 'makanan', 'label' => ' Sisa Makanan/Masakan', 'icon' => '🍽️'],
                ['value' => 'tumbuhan', 'label' => ' Tumbuhan/Daun/Ranting', 'icon' => '🌿'],
                ['value' => 'kemasan', 'label' => ' Kemasan/Bungkus Produk', 'icon' => '📦'],
                ['value' => 'elektronik', 'label' => ' Elektronik/Baterai', 'icon' => '🔌'],
                ['value' => 'medis', 'label' => ' Medis/Obat-obatan', 'icon' => '💊']
            ]
        ],
        [
            'id' => 'q2',
            'question' => 'Bagaimana tekstur sampah Anda?',
            'options' => [
                ['value' => 'basah', 'label' => ' Basah/Lembek', 'icon' => '💧'],
                ['value' => 'kering', 'label' => ' Kering/Keras', 'icon' => '🏜️'],
                ['value' => 'licin', 'label' => ' Licin/Fleksibel', 'icon' => '✨']
            ]
        ],
        [
            'id' => 'q3',
            'question' => 'Apakah sampah berbau?',
            'options' => [
                ['value' => 'berbau', 'label' => ' Ya, Berbau', 'icon' => '👃'],
                ['value' => 'tidak', 'label' => ' Tidak Berbau', 'icon' => '🌬️']
            ]
        ],
        [
            'id' => 'q4',
            'question' => 'Apakah sampah ini berbahaya atau mengandung bahan kimia?',
            'options' => [
                ['value' => 'berbahaya', 'label' => ' Ya, Berbahaya/Kimia', 'icon' => '⚠️'],
                ['value' => 'aman', 'label' => ' Tidak, Aman', 'icon' => '✅']
            ]
        ]
    ];

    // Ambil basis pengetahuan dari DATABASE
    private function getKnowledgeBase()
    {
        return WasteKnowledge::aktif()->get()->map(function ($item) {
            return [
                'id' => $item->id, // Gunakan ID dari database
                'jenis' => $item->jenis_sampah,
                'icon' => $item->icon,
                'ciri' => $item->ciri_ciri,
                'pengelolaan' => $item->pengelolaan,
                'deskripsi' => $item->deskripsi,
                'langkah' => $item->langkah_langkah,
                'kategori' => $item->kategori
            ];
        })->toArray();
    }

    // Logika Inferensi Sistem Pakar - DIUPDATE
    private function diagnoseWaste($answers)
    {
        $asal = $answers['q1'] ?? '';
        $tekstur = $answers['q2'] ?? '';
        $bau = $answers['q3'] ?? '';
        $bahaya = $answers['q4'] ?? '';

        $knowledge_base = $this->getKnowledgeBase();

        // Aturan Inferensi berdasarkan data dari database
        if ($bahaya === 'berbahaya') {
            if ($asal === 'elektronik') {
                return $this->findWasteByCategory($knowledge_base, 'b3');
            } elseif ($asal === 'medis') {
                return $this->findWasteByCategory($knowledge_base, 'b3');
            }
        }

        if ($asal === 'makanan' && $tekstur === 'basah' && $bau === 'berbau') {
            return $this->findWasteByCategory($knowledge_base, 'organik');
        }

        if ($asal === 'tumbuhan' && $tekstur === 'kering') {
            return $this->findWasteByCategory($knowledge_base, 'organik');
        }

        if ($asal === 'kemasan') {
            if ($tekstur === 'licin') {
                return $this->findWasteByCategory($knowledge_base, 'anorganik');
            } elseif ($tekstur === 'kering') {
                return $this->findWasteByCategory($knowledge_base, 'anorganik');
            }
        }

        // Default: return data pertama dari database
        return $knowledge_base[0] ?? null;
    }

    // Cari waste berdasarkan ID
    private function findWasteById($knowledge_base, $id)
    {
        foreach ($knowledge_base as $waste) {
            if ($waste['id'] == $id) {
                return $waste;
            }
        }
        return $knowledge_base[0] ?? null;
    }

    // Cari waste berdasarkan kategori
    private function findWasteByCategory($knowledge_base, $kategori)
    {
        foreach ($knowledge_base as $waste) {
            if ($waste['kategori'] === $kategori) {
                return $waste;
            }
        }
        return $knowledge_base[0] ?? null;
    }

    // Method konsultasi (tetap sama)
    public function konsultasi(Request $request)
    {
        $current_step = $request->session()->get('current_step', 1);
        $answers = $request->session()->get('answers', []);
        $result = null;

        if ($request->isMethod('post')) {
            if ($request->has('reset')) {
                $request->session()->forget(['current_step', 'answers']);
                return redirect()->route('konsultasi');
            }

            if ($request->has('answer')) {
                $question_id = 'q' . $current_step;
                $answers[$question_id] = $request->answer;

                $request->session()->put('answers', $answers);

                if ($current_step < count($this->questions)) {
                    $current_step++;
                    $request->session()->put('current_step', $current_step);
                } else {
                    // Diagnosis selesai
                    $result = $this->diagnoseWaste($answers);
                    $request->session()->forget(['current_step', 'answers']);
                }
            }
        }

        $total_questions = count($this->questions);
        $progress = ($current_step / $total_questions) * 100;

        return view('konsultasi', [
            'current_step' => $current_step,
            'questions' => $this->questions,
            'total_questions' => $total_questions,
            'progress' => $progress,
            'answers' => $answers,
            'result' => $result
        ]);
    }
}
