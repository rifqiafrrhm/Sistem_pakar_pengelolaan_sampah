<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WasteKnowledge;
use Illuminate\Support\Facades\Log;

class ExpertSystemController extends Controller
{
    private $questions = [
        [
            'id' => 'q1',
            'question' => 'Dari mana asal sampah Anda?',
            'options' => [
                ['value' => 'makanan', 'label' => 'Sisa Makanan/Masakan', 'icon' => '🍽️'],
                ['value' => 'tumbuhan', 'label' => 'Tumbuhan/Daun/Ranting', 'icon' => '🌿'],
                ['value' => 'kemasan', 'label' => 'Kemasan/Bungkus Produk', 'icon' => '📦'],
                ['value' => 'elektronik', 'label' => 'Elektronik/Baterai', 'icon' => '🔌'],
                ['value' => 'medis', 'label' => 'Medis/Obat-obatan', 'icon' => '💊']
            ]
        ],
        [
            'id' => 'q2',
            'question' => 'Bagaimana tekstur sampah Anda?',
            'options' => [
                ['value' => 'basah', 'label' => 'Basah/Lembek', 'icon' => '💧'],
                ['value' => 'kering', 'label' => 'Kering/Keras', 'icon' => '🏜️'],
                ['value' => 'licin', 'label' => 'Licin/Fleksibel', 'icon' => '✨'],
                ['value' => 'variasi', 'label' => 'Variasi', 'icon' => '🔀']
            ]
        ],
        [
            'id' => 'q3',
            'question' => 'Apakah sampah berbau?',
            'options' => [
                ['value' => 'berbau', 'label' => 'Ya, Berbau', 'icon' => '👃'],
                ['value' => 'tidak', 'label' => 'Tidak Berbau', 'icon' => '🌬️']
            ]
        ],
        [
            'id' => 'q4',
            'question' => 'Apakah sampah ini berbahaya atau mengandung bahan kimia?',
            'options' => [
                ['value' => 'berbahaya', 'label' => 'Ya, Berbahaya/Kimia', 'icon' => '⚠️'],
                ['value' => 'aman', 'label' => 'Tidak, Aman', 'icon' => '✅']
            ]
        ]
    ];

    private $customRules = [
        ['q1' => 'medis', 'q2' => 'kering', 'q3' => 'tidak', 'q4' => 'berbahaya', 'result' => 'Limbah Medis (infeksus)'],
        ['q1' => 'medis', 'q2' => 'basah', 'q3' => 'berbau', 'q4' => 'berbahaya', 'result' => 'Limbah Medis (infeksus)'],
        ['q1' => 'medis', 'q2' => 'licin', 'q3' => 'tidak', 'q4' => 'berbahaya', 'result' => 'Limbah Medis (infeksus)'],
        ['q1' => 'medis', 'q2' => 'variasi', 'q3' => 'berbau', 'q4' => 'berbahaya', 'result' => 'Limbah Medis (infeksus)'],

        ['q1' => 'medis', 'q2' => 'kering', 'q3' => 'tidak', 'q4' => 'aman', 'result' => 'Limbah Medis (Rumah Tangga)'],
        ['q1' => 'medis', 'q2' => 'basah', 'q3' => 'berbau', 'q4' => 'aman', 'result' => 'Limbah Medis (Rumah Tangga)'],

        ['q1' => 'elektronik', 'q2' => 'kering', 'q3' => 'tidak', 'q4' => 'berbahaya', 'result' => 'Elektronik & Baterai'],
        ['q1' => 'elektronik', 'q2' => 'kering', 'q3' => 'tidak', 'q4' => 'aman', 'result' => 'Elektronik & Baterai'],
        ['q1' => 'elektronik', 'q2' => 'licin', 'q3' => 'tidak', 'q4' => 'aman', 'result' => 'Elektronik & Baterai'],
        ['q1' => 'elektronik', 'q2' => 'licin', 'q3' => 'tidak', 'q4' => 'berbahaya', 'result' => 'Elektronik & Baterai'],
        ['q1' => 'elektronik', 'q2' => 'variasi', 'q3' => 'tidak', 'q4' => 'berbahaya', 'result' => 'Elektronik & Baterai'],

        ['q1' => 'makanan', 'q2' => 'basah', 'q3' => 'berbau', 'q4' => 'aman', 'result' => 'Sampah Organik Basah (Sisa Makanan)'],
        ['q1' => 'makanan', 'q2' => 'basah', 'q3' => 'tidak', 'q4' => 'aman', 'result' => 'Sampah Organik Basah (Sisa Makanan)'],
        ['q1' => 'tumbuhan', 'q2' => 'basah', 'q3' => 'berbau', 'q4' => 'aman', 'result' => 'Sampah Organik Basah (Sisa Makanan)'],

        ['q1' => 'makanan', 'q2' => 'kering', 'q3' => 'tidak', 'q4' => 'aman', 'result' => 'Sampah Organik Kering (Daun & Ranting)'],
        ['q1' => 'tumbuhan', 'q2' => 'kering', 'q3' => 'tidak', 'q4' => 'aman', 'result' => 'Sampah Organik Kering (Daun & Ranting)'],
        ['q1' => 'tumbuhan', 'q2' => 'kering', 'q3' => 'berbau', 'q4' => 'aman', 'result' => 'Sampah Organik Kering (Daun & Ranting)'],

        ['q1' => 'kemasan', 'q2' => 'licin', 'q3' => 'tidak', 'q4' => 'aman', 'result' => 'Plastik Kemasan & Botol'],
        ['q1' => 'kemasan', 'q2' => 'licin', 'q3' => 'berbau', 'q4' => 'aman', 'result' => 'Plastik Kemasan & Botol'],

        ['q1' => 'kemasan', 'q2' => 'kering', 'q3' => 'tidak', 'q4' => 'aman', 'result' => 'Kertas & Kardus'],
        ['q1' => 'kemasan', 'q2' => 'basah', 'q3' => 'berbau', 'q4' => 'aman', 'result' => 'Kertas & Kardus'],
        ['q1' => 'kemasan', 'q2' => 'kering', 'q3' => 'berbau', 'q4' => 'aman', 'result' => 'Kertas & Kardus'],

        ['q1' => 'kemasan', 'q2' => 'kering', 'q3' => 'tidak', 'q4' => 'berbahaya', 'result' => 'Kaleng & Logam'],
        ['q1' => 'kemasan', 'q2' => 'licin', 'q3' => 'tidak', 'q4' => 'berbahaya', 'result' => 'Kaleng & Logam'],

        ['q1' => 'makanan', 'q2' => 'basah', 'q3' => 'berbau', 'q4' => 'berbahaya', 'result' => 'Limbah Kimia Rumah Tangga'],
        ['q1' => 'makanan', 'q2' => 'licin', 'q3' => 'berbau', 'q4' => 'berbahaya', 'result' => 'Limbah Kimia Rumah Tangga'],
        ['q1' => 'tumbuhan', 'q2' => 'kering', 'q3' => 'berbau', 'q4' => 'berbahaya', 'result' => 'Limbah Kimia Rumah Tangga'],
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
                if (!$this->isValidAnswer($current_step, $request->answer)) {
                    return back()->withErrors(['answer' => 'Pilihan tidak valid']);
                }

                $question_id = 'q' . $current_step;
                $answers[$question_id] = $request->answer;
                $request->session()->put('answers', $answers);

                if ($current_step < count($this->questions)) {
                    $current_step++;
                    $request->session()->put('current_step', $current_step);
                } else {
                    try {
                        $result = $this->diagnoseWaste($answers);
                        $request->session()->forget(['current_step', 'answers']);
                    } catch (\Exception $e) {
                        Log::error('Expert System Error: ' . $e->getMessage());
                        return back()->withErrors(['system' => 'Terjadi kesalahan sistem. Silakan coba lagi.']);
                    }
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

    private function isValidAnswer($step, $answer)
    {
        if ($step < 1 || $step > count($this->questions)) {
            return false;
        }

        $question = $this->questions[$step - 1];
        $validOptions = array_column($question['options'], 'value');

        return in_array($answer, $validOptions);
    }

    private function diagnoseWaste($answers)
    {
        foreach ($this->customRules as $rule) {
            if ($this->checkRuleConditions($rule, $answers)) {
                $result = $this->getResultByName($rule['result']);
                if ($result) {
                    return $result;
                }
            }
        }

        $result = $this->getFallbackByOrigin($answers['q1'] ?? null);
        if ($result) {
            return $result;
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
        try {
            $result = WasteKnowledge::where('jenis_sampah', $itemName)
                ->aktif()
                ->first();

            if ($result) {
                return $this->formatResult($result);
            }

            return null;
        } catch (\Exception $e) {
            Log::error('Database Error in getResultByName: ' . $e->getMessage());
            return null;
        }
    }

    private function getFallbackByOrigin($origin)
    {
        $categoryMap = [
            'makanan' => 'Sampah Organik Basah (Sisa Makanan)',
            'tumbuhan' => 'Sampah Organik Kering (Daun & Ranting)',
            'kemasan' => 'Plastik Kemasan & Botol',
            'elektronik' => 'Elektronik & Baterai',
            'medis' => 'Limbah Medis (Rumah Tangga)',
        ];

        $categoryName = $categoryMap[$origin] ?? null;

        if ($categoryName) {
            return $this->getResultByName($categoryName);
        }

        return null;
    }

    private function formatResult($result)
    {
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

    private function getDefaultResult()
    {
        try {
            $defaultItem = WasteKnowledge::aktif()->first();

            if ($defaultItem) {
                return $this->formatResult($defaultItem);
            }
        } catch (\Exception $e) {
            Log::error('Database Error in getDefaultResult: ' . $e->getMessage());
        }

        return [
            'id' => 'default',
            'jenis' => 'Sampah Umum',
            'kategori' => 'organik',
            'icon' => '🗑️',
            'deskripsi' => 'Silakan pilah sampah berdasarkan jenisnya untuk pengelolaan yang lebih baik.',
            'pengelolaan' => 'Pisahkan antara sampah organik dan anorganik. Sampah organik dapat dijadikan kompos, sementara sampah anorganik dapat didaur ulang.',
            'langkah' => ['Pilah sampah', 'Buang pada tempat yang sesuai', 'Hubungi pengelola sampah setempat'],
            'ciri' => ['tekstur' => 'bervariasi', 'bau' => 'bervariasi', 'asal' => 'bervariasi']
        ];
    }
}
