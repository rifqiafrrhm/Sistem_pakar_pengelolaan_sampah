<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WasteKnowledge;
use Illuminate\Support\Facades\Log;

class ExpertSystemController extends Controller
{
    private $customRules = [
        [
            'q1' => 'makanan',
            'q2' => 'basah',
            'q3' => 'berbau',
            'q4' => 'aman',
            'result' => 'Sampah Organik Basah (Sisa Makanan)'
        ],
        [
            'q1' => 'tumbuhan',
            'q2' => 'kering',
            'q3' => 'tidak',
            'q4' => 'aman',
            'result' => 'Sampah Organik Kering (Daun & Ranting)'
        ],
        [
            'q1' => 'kemasan',
            'q2' => 'licin',
            'q3' => 'tidak',
            'q4' => 'aman',
            'result' => 'Plastik Kemasan & Botol'
        ],
    ];

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


    private function diagnoseWaste($answers)
    {
        if (($answers['q4'] ?? '') === 'berbahaya') {

            if (($answers['q1'] ?? '') === 'elektronik') {
                return $this->getResultByName('Elektronik & Baterai');
            }

            if (($answers['q1'] ?? '') === 'medis') {
                return $this->getResultByName('Limbah Medis (Rumah Tangga)');
            }
        }

        foreach ($this->customRules as $rule) {
            if ($this->checkRuleConditions($rule, $answers)) {
                $dbResult = $this->getResultByName($rule['result']);
                if ($dbResult) return $dbResult;
            }
        }

        $fallback = $this->getFallbackByOrigin($answers['q1'] ?? null);
        if ($fallback) return $fallback;

        return $this->getDefaultResult();
    }

    private function checkRuleConditions($rule, $answers)
    {
        return
            ($answers['q1'] ?? null) === $rule['q1'] &&
            ($answers['q2'] ?? null) === $rule['q2'] &&
            ($answers['q3'] ?? null) === $rule['q3'] &&
            ($answers['q4'] ?? null) === $rule['q4'];
    }

    private function getResultByName($jenis)
    {
        try {
            $item = WasteKnowledge::where('jenis_sampah', $jenis)->aktif()->first();
            if ($item) return $this->formatResult($item);
        } catch (\Exception $e) {
            Log::error("DB ERROR getResultByName: " . $e->getMessage());
        }
        return null;
    }

    private function getFallbackByOrigin($origin)
    {
        $map = [
            'makanan' => 'Sampah Organik Basah (Sisa Makanan)',
            'tumbuhan' => 'Sampah Organik Kering (Daun & Ranting)',
            'kemasan' => 'Plastik Kemasan & Botol',
            'elektronik' => 'Elektronik & Baterai',
            'medis' => 'Limbah Medis (Rumah Tangga)',
        ];

        if (!$origin || !isset($map[$origin])) {
            return null;
        }

        return $this->getResultByName($map[$origin]);
    }

    private function formatResult($item)
    {
        return [
            'id' => $item->id,
            'jenis' => $item->jenis_sampah,
            'icon' => $item->icon,
            'ciri' => $item->ciri_ciri,
            'pengelolaan' => $item->pengelolaan,
            'deskripsi' => $item->deskripsi,
            'langkah' => $item->langkah_langkah,
            'kategori' => $item->kategori,
        ];
    }

    private function getDefaultResult()
    {
        return [
            'jenis' => 'Sampah Umum',
            'kategori' => 'umum',
            'icon' => '🗑️',
            'deskripsi' => 'Pilah sampah untuk pengelolaan lebih baik.',
            'pengelolaan' => 'Pisahkan organik dan anorganik.',
            'langkah' => ['Pilah sampah', 'Buang pada tempat yang sesuai'],
            'ciri' => ['asal' => 'bervariasi', 'tekstur' => 'bervariasi', 'bau' => 'bervariasi'],
        ];
    }

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

                $answers['q' . $current_step] = $request->answer;
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

        return view('konsultasi', [
            'current_step' => $current_step,
            'questions' => $this->questions,
            'progress' => ($current_step / count($this->questions)) * 100,
            'answers' => $answers,
            'result' => $result
        ]);
    }

    private function isValidAnswer($step, $answer)
    {
        $valid = array_column($this->questions[$step - 1]['options'], 'value');
        return in_array($answer, $valid);
    }
}
