<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpertSystemController extends Controller
{
    // Basis Aturan Sistem Pakar
    private $knowledge_base = [
        [
            'id' => 'organik_basah',
            'jenis' => 'Sampah Organik Basah',
            'icon' => '🍃',
            'ciri' => [
                'tekstur' => 'Lembek/basah',
                'bau' => 'Berbau',
                'asal' => 'Sisa makanan/tumbuhan'
            ],
            'pengelolaan' => 'Kompos atau biogas',
            'deskripsi' => 'Sampah ini dapat diurai dengan cepat dan dapat dijadikan pupuk kompos.',
            'langkah' => [
                'Pisahkan dari sampah lain',
                'Masukkan ke komposter atau lubang biopori',
                'Tunggu 2-3 bulan hingga jadi kompos',
                'Gunakan sebagai pupuk tanaman'
            ]
        ],
        [
            'id' => 'organik_kering',
            'jenis' => 'Sampah Organik Kering',
            'icon' => '🍂',
            'ciri' => [
                'tekstur' => 'Kering/keras',
                'bau' => 'Tidak berbau',
                'asal' => 'Daun kering/ranting'
            ],
            'pengelolaan' => 'Kompos kering atau mulsa',
            'deskripsi' => 'Cocok untuk kompos kering atau digunakan sebagai mulsa tanaman.',
            'langkah' => [
                'Kumpulkan sampah organik kering',
                'Cacah menjadi potongan kecil',
                'Campurkan dengan tanah',
                'Atau gunakan langsung sebagai mulsa penutup tanah'
            ]
        ],
        [
            'id' => 'plastik',
            'jenis' => 'Sampah Plastik',
            'icon' => '♻️',
            'ciri' => [
                'tekstur' => 'Licin/fleksibel',
                'bau' => 'Tidak berbau',
                'asal' => 'Kemasan/botol plastik'
            ],
            'pengelolaan' => 'Daur ulang atau bank sampah',
            'deskripsi' => 'Plastik dapat didaur ulang menjadi produk baru atau dijual ke bank sampah.',
            'langkah' => [
                'Bersihkan dari sisa makanan',
                'Pisahkan berdasarkan jenis (PET, HDPE, PP)',
                'Kumpulkan hingga jumlah banyak',
                'Setor ke bank sampah atau pengepul'
            ]
        ],
        [
            'id' => 'kertas',
            'jenis' => 'Sampah Kertas/Kardus',
            'icon' => '📦',
            'ciri' => [
                'tekstur' => 'Kering/kaku',
                'bau' => 'Tidak berbau',
                'asal' => 'Kertas/kardus bekas'
            ],
            'pengelolaan' => 'Daur ulang',
            'deskripsi' => 'Kertas dan kardus masih memiliki nilai ekonomi tinggi untuk didaur ulang.',
            'langkah' => [
                'Pastikan kertas dalam kondisi kering',
                'Lipat atau press untuk menghemat tempat',
                'Pisahkan dari plastik atau lakban',
                'Jual ke pengepul atau bank sampah'
            ]
        ],
        [
            'id' => 'kaca',
            'jenis' => 'Sampah Kaca/Botol',
            'icon' => '🫙',
            'ciri' => [
                'tekstur' => 'Keras/pecah',
                'bau' => 'Tidak berbau',
                'asal' => 'Botol kaca/pecahan'
            ],
            'pengelolaan' => 'Daur ulang dengan hati-hati',
            'deskripsi' => 'Kaca dapat didaur ulang berkali-kali tanpa kehilangan kualitas.',
            'langkah' => [
                'Hati-hati dengan pecahan',
                'Bungkus pecahan dengan koran',
                'Botol utuh bisa digunakan kembali',
                'Setor ke bank sampah khusus kaca'
            ]
        ],
        [
            'id' => 'logam',
            'jenis' => 'Sampah Logam/Kaleng',
            'icon' => '🥫',
            'ciri' => [
                'tekstur' => 'Keras/mengkilap',
                'bau' => 'Tidak berbau',
                'asal' => 'Kaleng minuman/logam'
            ],
            'pengelolaan' => 'Daur ulang',
            'deskripsi' => 'Logam memiliki nilai jual tinggi dan mudah didaur ulang.',
            'langkah' => [
                'Bersihkan dari isi',
                'Gepengkan kaleng untuk hemat tempat',
                'Pisahkan aluminium dan besi',
                'Jual ke pengepul dengan harga per kg'
            ]
        ],
        [
            'id' => 'b3_elektronik',
            'jenis' => 'Sampah B3 Elektronik',
            'icon' => '🔋',
            'ciri' => [
                'tekstur' => 'Keras/berbahaya',
                'bau' => 'Kadang berbau kimia',
                'asal' => 'Baterai/elektronik rusak'
            ],
            'pengelolaan' => 'Serahkan ke tempat khusus B3',
            'deskripsi' => 'BERBAHAYA! Mengandung logam berat yang mencemari lingkungan.',
            'langkah' => [
                'JANGAN buang ke tempat sampah biasa',
                'Kumpulkan dalam wadah terpisah',
                'Cari drop point atau tempat pengumpulan B3',
                'Serahkan ke pihak berwenang'
            ]
        ],
        [
            'id' => 'b3_medis',
            'jenis' => 'Sampah B3 Medis',
            'icon' => '💉',
            'ciri' => [
                'tekstur' => 'Bervariasi',
                'bau' => 'Bau obat/kimia',
                'asal' => 'Jarum/obat/perban'
            ],
            'pengelolaan' => 'Serahkan ke fasilitas kesehatan',
            'deskripsi' => 'SANGAT BERBAHAYA! Bisa menularkan penyakit.',
            'langkah' => [
                'Masukkan dalam wadah khusus (safety box)',
                'JANGAN dibuang sembarangan',
                'Kembalikan ke apotek/rumah sakit',
                'Atau hubungi dinas kesehatan setempat'
            ]
        ]
    ];

    // Pertanyaan Sistem Pakar
    private $questions = [
        [
            'id' => 'q1',
            'question' => 'Dari mana asal sampah Anda?',
            'options' => [
                ['value' => 'makanan', 'label' => '🍽️ Sisa Makanan/Masakan', 'icon' => '🍽️'],
                ['value' => 'tumbuhan', 'label' => '🌿 Tumbuhan/Daun/Ranting', 'icon' => '🌿'],
                ['value' => 'kemasan', 'label' => '📦 Kemasan/Bungkus Produk', 'icon' => '📦'],
                ['value' => 'elektronik', 'label' => '🔌 Elektronik/Baterai', 'icon' => '🔌'],
                ['value' => 'medis', 'label' => '💊 Medis/Obat-obatan', 'icon' => '💊']
            ]
        ],
        [
            'id' => 'q2',
            'question' => 'Bagaimana tekstur sampah Anda?',
            'options' => [
                ['value' => 'basah', 'label' => '💧 Basah/Lembek', 'icon' => '💧'],
                ['value' => 'kering', 'label' => '🏜️ Kering/Keras', 'icon' => '🏜️'],
                ['value' => 'licin', 'label' => '✨ Licin/Fleksibel', 'icon' => '✨']
            ]
        ],
        [
            'id' => 'q3',
            'question' => 'Apakah sampah berbau?',
            'options' => [
                ['value' => 'berbau', 'label' => '👃 Ya, Berbau', 'icon' => '👃'],
                ['value' => 'tidak', 'label' => '🌬️ Tidak Berbau', 'icon' => '🌬️']
            ]
        ],
        [
            'id' => 'q4',
            'question' => 'Apakah sampah ini berbahaya atau mengandung bahan kimia?',
            'options' => [
                ['value' => 'berbahaya', 'label' => '⚠️ Ya, Berbahaya/Kimia', 'icon' => '⚠️'],
                ['value' => 'aman', 'label' => '✅ Tidak, Aman', 'icon' => '✅']
            ]
        ]
    ];

    // Logika Inferensi Sistem Pakar
    private function diagnoseWaste($answers)
    {
        $asal = $answers['q1'] ?? '';
        $tekstur = $answers['q2'] ?? '';
        $bau = $answers['q3'] ?? '';
        $bahaya = $answers['q4'] ?? '';

        // Aturan Inferensi
        if ($bahaya === 'berbahaya') {
            if ($asal === 'elektronik') {
                return $this->findWasteById('b3_elektronik');
            } elseif ($asal === 'medis') {
                return $this->findWasteById('b3_medis');
            }
        }

        if ($asal === 'makanan' && $tekstur === 'basah' && $bau === 'berbau') {
            return $this->findWasteById('organik_basah');
        }

        if ($asal === 'tumbuhan' && $tekstur === 'kering') {
            return $this->findWasteById('organik_kering');
        }

        if ($asal === 'kemasan') {
            if ($tekstur === 'licin') {
                return $this->findWasteById('plastik');
            } elseif ($tekstur === 'kering') {
                return $this->findWasteById('kertas');
            }
        }

        // Default: return yang paling sesuai
        return $this->findWasteById('organik_basah');
    }

    private function findWasteById($id)
    {
        foreach ($this->knowledge_base as $waste) {
            if ($waste['id'] === $id) {
                return $waste;
            }
        }
        return $this->knowledge_base[0];
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
