<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WasteKnowledge;

class ExpertSystemController extends Controller
{
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

    private $customRules = [
        ['q1' => 'medis', 'q2' => 'kering', 'q3' => 'tidak', 'q4' => 'berbahaya', 'result' => 'Limbah Medis & Obat-obatan'],
        ['q1' => 'medis', 'q2' => 'kering', 'q3' => 'tidak', 'q4' => 'aman', 'result' => 'Limbah Medis & Obat-obatan'],
        ['q1' => 'medis', 'q2' => 'basah', 'q3' => 'berbau', 'q4' => 'berbahaya', 'result' => 'Limbah Medis & Obat-obatan'],

        ['q1' => 'elektronik', 'q2' => 'kering', 'q3' => 'tidak', 'q4' => 'berbahaya', 'result' => 'Elektronik & Baterai'],
        ['q1' => 'elektronik', 'q2' => 'kering', 'q3' => 'tidak', 'q4' => 'aman', 'result' => 'Elektronik & Baterai'],
        ['q1' => 'elektronik', 'q2' => 'licin', 'q3' => 'tidak', 'q4' => 'aman', 'result' => 'Elektronik & Baterai'],
        ['q1' => 'elektronik', 'q2' => 'licin', 'q3' => 'tidak', 'q4' => 'berbahaya', 'result' => 'Elektronik & Baterai'],

        ['q1' => 'makanan', 'q2' => 'basah', 'q3' => 'berbau', 'q4' => 'aman', 'result' => 'Sampah Organik Basah (Sisa Makanan)'],
        ['q1' => 'makanan', 'q2' => 'basah', 'q3' => 'tidak', 'q4' => 'aman', 'result' => 'Sisa Buah & Sayuran'],
        ['q1' => 'makanan', 'q2' => 'kering', 'q3' => 'tidak', 'q4' => 'aman', 'result' => 'Sampah Organik Kering (Daun & Ranting)'],
        ['q1' => 'makanan', 'q2' => 'basah', 'q3' => 'berbau', 'q4' => 'berbahaya', 'result' => 'Limbah Kimia Rumah Tangga'],

        ['q1' => 'tumbuhan', 'q2' => 'kering', 'q3' => 'tidak', 'q4' => 'aman', 'result' => 'Sampah Organik Kering (Daun & Ranting)'],
        ['q1' => 'tumbuhan', 'q2' => 'basah', 'q3' => 'berbau', 'q4' => 'aman', 'result' => 'Sampah Organik Basah (Sisa Makanan)'],
        ['q1' => 'tumbuhan', 'q2' => 'kering', 'q3' => 'berbau', 'q4' => 'berbahaya', 'result' => 'Limbah Kimia Rumah Tangga'],

        ['q1' => 'kemasan', 'q2' => 'licin', 'q3' => 'tidak', 'q4' => 'aman', 'result' => 'Plastik Kemasan & Botol'],
        ['q1' => 'kemasan', 'q2' => 'kering', 'q3' => 'tidak', 'q4' => 'aman', 'result' => 'Kertas & Kardus'],
        ['q1' => 'kemasan', 'q2' => 'basah', 'q3' => 'berbau', 'q4' => 'aman', 'result' => 'Kertas & Kardus'],
        ['q1' => 'kemasan', 'q2' => 'licin', 'q3' => 'tidak', 'q4' => 'berbahaya', 'result' => 'Kalong & Logan'],
    ];

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

    private function diagnoseWaste($answers)
    {
        foreach ($this->customRules as $rule) {
            if ($this->checkRuleConditions($rule, $answers)) {
                return $this->getResultByName($rule['result']);
            }
        }

        return $this->getDefaultResult();
    }

    private function checkRuleConditions($rule, $answers)
    {
        return
            ($answers['q1'] ?? '') === $rule['q1'] &&
            ($answers['q2'] ?? '') === $rule['q2'] &&
            ($answers['q3'] ?? '') === $rule['q3'] &&
            ($answers['q4'] ?? '') === $rule['q4'];
    }

    private function getResultByName($itemName)
    {
        $result = WasteKnowledge::where('jenis_sampah', 'like', '%' . $itemName . '%')
            ->aktif()
            ->first();

        if ($result) {
            return [
                'id' => $result->id,
                'jenis' => $result->jenis_sampah,
                'icon' => $result->icon,
                'ciri' => $result->ciri_ciri,
                'pengelolaan' => $result->pengelolaan,
                'deskripsi' => $result->deskripsi,
                'langkah' => $result->langkah_langkah,
                'kategori' => $result->kategori
            ];
        }

        return $this->getDefaultResult();
    }

    private function getDefaultResult()
    {
        $defaultItem = WasteKnowledge::aktif()->first();

        if ($defaultItem) {
            return [
                'id' => $defaultItem->id,
                'jenis' => $defaultItem->jenis_sampah,
                'icon' => $defaultItem->icon,
                'ciri' => $defaultItem->ciri_ciri,
                'pengelolaan' => $defaultItem->pengelolaan,
                'deskripsi' => $defaultItem->deskripsi,
                'langkah' => $defaultItem->langkah_langkah,
                'kategori' => $defaultItem->kategori
            ];
        }

        return [
            'id' => 'default',
            'jenis' => 'Sampah Umum',
            'kategori' => 'organik',
            'icon' => '🗑️',
            'deskripsi' => 'Silakan pilah sampah berdasarkan jenisnya',
            'pengelolaan' => 'Pisahkan antara sampah organik dan anorganik',
            'langkah' => ['Pilah sampah', 'Buang pada tempat yang sesuai'],
            'ciri' => ['tekstur' => 'bervariasi', 'bau' => 'bervariasi', 'asal' => 'bervariasi']
        ];
    }
}
