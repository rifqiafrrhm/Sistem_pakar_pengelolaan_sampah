@extends('layouts.app')

@section('title', 'Konsultasi Sistem Pakar')

@section('content')
<div class="konsultasi-container">
    <div class="konsultasi-header">
        <h1>🔍 Konsultasi Sistem Pakar</h1>
        <p>Jawab pertanyaan untuk mendapatkan rekomendasi pengelolaan sampah</p>
    </div>

    @if (!$result)
        <!-- Progress Bar -->
        <div class="progress-container">
            <div class="progress-bar" style="width: {{ $progress }}%">
                {{ round($progress) }}%
            </div>
        </div>

        <!-- Question Card -->
        <div class="konsultasi-card">
            <form method="POST">
                @csrf
                <h2 class="question-title">
                    {{ $questions[$current_step - 1]['question'] }}
                </h2>
                <p class="question-subtitle">
                    Pertanyaan {{ $current_step }} dari {{ $total_questions }}
                </p>

                <div class="options">
                    @foreach ($questions[$current_step - 1]['options'] as $option)
                        <label class="option">
                            <input type="radio" name="answer" value="{{ $option['value'] }}" required>
                            <div class="option-icon">{{ $option['icon'] }}</div>
                            <div class="option-label">{{ $option['label'] }}</div>
                        </label>
                    @endforeach
                </div>

                <div class="btn-container">
                    @if ($current_step > 1)
                        <button type="submit" name="reset" class="btn btn-secondary">
                            ↩️ Ulang dari Awal
                        </button>
                    @endif
                    <button type="submit" class="btn btn-primary">
                        {{ $current_step < $total_questions ? 'Lanjut ➡️' : '✅ Lihat Hasil' }}
                    </button>
                </div>
            </form>
        </div>

    @else
        <!-- Result Card -->
        <div class="konsultasi-card result-card">
            <div class="result-header">
                <div class="result-icon">{{ $result['icon'] }}</div>
                <div>
                    <div class="result-title">{{ $result['jenis'] }}</div>
                    <div style="color: var(--text-light);">Rekomendasi Pengelolaan: {{ $result['pengelolaan'] }}</div>
                </div>
            </div>

            @if (strpos($result['id'], 'b3') !== false)
                <div class="danger-box">
                    <strong>⚠️ PERINGATAN:</strong> Ini adalah sampah berbahaya dan beracun (B3)!
                </div>
            @endif

            <div class="result-description">
                {{ $result['deskripsi'] }}
            </div>

            <div class="result-section">
                <h3>📋 Langkah Pengelolaan:</h3>
                <div class="steps-list">
                    @foreach ($result['langkah'] as $index => $langkah)
                        <div class="step-item">
                            <div class="step-number">{{ $index + 1 }}</div>
                            <div>{{ $langkah }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="result-section">
                <h3>✅ Karakteristik Sampah:</h3>
                <div class="steps-list">
                    @foreach ($result['ciri'] as $key => $value)
                        <div class="step-item">
                            <div>💡</div>
                            <div><strong>{{ ucfirst($key) }}:</strong> {{ $value }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <form method="POST">
                @csrf
                <button type="submit" name="reset" class="btn btn-primary" style="width: 100%;">
                    🔄 Konsultasi Lagi
                </button>
            </form>
        </div>
    @endif
</div>
@endsection
