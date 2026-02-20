@extends('layouts.user')

@section('content')
    @push('styles')
    <style>
        .score-circle {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            font-weight: bold;
            margin: 0 auto;
        }
        .score-excellent { background: linear-gradient(135deg, #10b981, #059669); }
        .score-good { background: linear-gradient(135deg, #3b82f6, #2563eb); }
        .score-average { background: linear-gradient(135deg, #f59e0b, #d97706); }
        .score-poor { background: linear-gradient(135deg, #ef4444, #dc2626); }

        .answer-correct { background-color: #d1fae5 !important; border-color: #10b981 !important; }
        .answer-wrong { background-color: #fee2e2 !important; border-color: #ef4444 !important; }

        .badge-lulus { background-color: #10b981; color: white; }
        .badge-tidak-lulus { background-color: #ef4444; color: white; }
    </style>
    @endpush

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-8 text-center">
                    <h1 class="text-3xl font-bold text-gray-900">Hasil Test PMB 2026</h1>
                    <p class="text-gray-600 mt-2">Nomor Test: <span class="font-bold">{{ $calonMaba->nomor_test ?? 'TEST-' . auth()->id() }}</span></p>
                </div>
            </div>

            <!-- Score Card -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                <!-- Score Circle -->
                <div class="bg-white shadow rounded-lg p-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-6 text-center">Nilai Akhir</h3>

                    @php
                        $scoreClass = 'score-excellent';
                        if ($testSession->nilai < 70) $scoreClass = 'score-poor';
                        elseif ($testSession->nilai < 80) $scoreClass = 'score-average';
                        elseif ($testSession->nilai < 90) $scoreClass = 'score-good';
                    @endphp

                    <div class="score-circle {{ $scoreClass }} text-white">
                        {{ number_format($testSession->nilai, 1) }}
                    </div>

                    <div class="text-center mt-6">
                        <span class="px-4 py-2 rounded-full text-sm font-bold {{ $testSession->hasil == 'lulus' ? 'badge-lulus' : 'badge-tidak-lulus' }}">
                            {{ $testSession->hasil == 'lulus' ? 'LULUS' : 'TIDAK LULUS' }}
                        </span>
                        <p class="mt-2 text-gray-600">Nilai kelulusan: 70</p>
                    </div>
                </div>

                <!-- Test Info -->
                <div class="bg-white shadow rounded-lg p-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">Informasi Test</h3>

                    <div class="space-y-4">
                        <div class="flex justify-between items-center border-b pb-3">
                            <span class="text-gray-600">Tanggal Test:</span>
                            <span class="font-bold">{{ $testSession->created_at->format('d F Y') }}</span>
                        </div>

                        <div class="flex justify-between items-center border-b pb-3">
                            <span class="text-gray-600">Waktu Mulai:</span>
                            <span class="font-bold">{{ $testSession->mulai ? $testSession->mulai->format('H:i') : '-' }}</span>
                        </div>

                        <div class="flex justify-between items-center border-b pb-3">
                            <span class="text-gray-600">Waktu Selesai:</span>
                            <span class="font-bold">{{ $testSession->selesai ? $testSession->selesai->format('H:i') : '-' }}</span>
                        </div>

                        <div class="flex justify-between items-center border-b pb-3">
                            <span class="text-gray-600">Durasi:</span>
                            <span class="font-bold">
                                @if($testSession->mulai && $testSession->selesai)
                                    {{ $testSession->mulai->diffInMinutes($testSession->selesai) }} menit
                                @else
                                    -
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Statistics -->
                <div class="bg-white shadow rounded-lg p-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">Statistik Jawaban</h3>

                    @php
                        $correct = $jawaban->where('is_correct', true)->count();
                        $wrong = $jawaban->where('is_correct', false)->count();
                        $total = $jawaban->count();
                        $correctPercent = $total > 0 ? ($correct / $total) * 100 : 0;
                        $wrongPercent = $total > 0 ? ($wrong / $total) * 100 : 0;
                    @endphp

                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-gray-600">Jawaban Benar</span>
                                <span class="font-bold text-green-600">{{ $correct }} ({{ number_format($correctPercent, 1) }}%)</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-green-600 h-2 rounded-full" style="width: {{ $correctPercent }}%"></div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-gray-600">Jawaban Salah</span>
                                <span class="font-bold text-red-600">{{ $wrong }} ({{ number_format($wrongPercent, 1) }}%)</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-red-600 h-2 rounded-full" style="width: {{ $wrongPercent }}%"></div>
                            </div>
                        </div>

                        <div class="pt-4 border-t">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="text-center p-3 bg-green-50 rounded-lg">
                                    <div class="text-2xl font-bold text-green-600">{{ $correct }}</div>
                                    <div class="text-sm text-green-700">Benar</div>
                                </div>
                                <div class="text-center p-3 bg-red-50 rounded-lg">
                                    <div class="text-2xl font-bold text-red-600">{{ $wrong }}</div>
                                    <div class="text-sm text-red-700">Salah</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail Jawaban -->
            <div class="bg-white shadow rounded-lg p-8">
                <h3 class="text-xl font-bold text-gray-800 mb-6">Detail Jawaban</h3>

                <div class="space-y-6">
                    @foreach($jawaban as $index => $jawab)
                    <div class="border border-gray-200 rounded-lg p-6 {{ $jawab->is_correct ? 'answer-correct' : 'answer-wrong' }}">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <span class="font-bold text-gray-700">Soal #{{ $index + 1 }}</span>
                                <span class="ml-2 px-2 py-1 text-xs rounded-full {{ $jawab->is_correct ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $jawab->is_correct ? 'Benar' : 'Salah' }}
                                </span>
                            </div>
                            <div class="text-sm text-gray-500">
                                Kategori: {{ ucfirst($jawab->soalTest->kategori) }}
                            </div>
                        </div>

                        <div class="mb-4">
                            <p class="text-gray-700 font-medium">{{ $jawab->soalTest->pertanyaan }}</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            @foreach(['a', 'b', 'c', 'd', 'e'] as $option)
                                @if($jawab->soalTest->{'pilihan_' . $option})
                                    @php
                                        $isCorrectAnswer = $jawab->soalTest->jawaban_benar == $option;
                                        $isUserAnswer = $jawab->jawaban_user == $option;
                                        $bgClass = '';
                                        if ($isCorrectAnswer) $bgClass = 'bg-green-50 border-green-300';
                                        elseif ($isUserAnswer && !$isCorrectAnswer) $bgClass = 'bg-red-50 border-red-300';
                                        else $bgClass = 'bg-gray-50 border-gray-200';
                                    @endphp

                                    <div class="{{ $bgClass }} border rounded-lg p-3">
                                        <div class="flex items-center">
                                            <span class="w-8 h-8 rounded-full flex items-center justify-center font-bold mr-3
                                                {{ $isCorrectAnswer ? 'bg-green-600 text-white' : ($isUserAnswer ? 'bg-red-600 text-white' : 'bg-gray-200 text-gray-700') }}">
                                                {{ strtoupper($option) }}
                                            </span>
                                            <span class="text-gray-700">{{ $jawab->soalTest->{'pilihan_' . $option} }}</span>
                                        </div>

                                        @if($isCorrectAnswer)
                                            <div class="mt-2 text-sm text-green-600 font-medium">
                                                ✓ Jawaban benar
                                            </div>
                                        @endif

                                        @if($isUserAnswer && !$isCorrectAnswer)
                                            <div class="mt-2 text-sm text-red-600 font-medium">
                                                ✗ Jawaban Anda
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        @if($jawab->soalTest->penjelasan)
                            <div class="mt-4 p-4 bg-blue-50 rounded-lg">
                                <span class="font-bold text-blue-800">Penjelasan:</span>
                                <p class="text-blue-700 mt-1">{{ $jawab->soalTest->penjelasan }}</p>
                            </div>
                        @endif
                    </div>
                    @endforeach
                </div>

                <!-- Next Steps -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Langkah Selanjutnya</h3>

                    @if($testSession->hasil == 'lulus')
                        <div class="bg-green-50 border-l-4 border-green-500 p-6 rounded-lg">
                            <h4 class="font-bold text-green-800 text-lg mb-2">🎉 Selamat! Anda dinyatakan LULUS!</h4>
                            <p class="text-green-700 mb-4">
                                Anda telah berhasil melewati test masuk PMB 2026. Langkah selanjutnya adalah melakukan
                                <strong>daftar ulang</strong> untuk melengkapi administrasi.
                            </p>
                            <a href="#" class="inline-block bg-green-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-green-700 transition">
                                Lanjutkan Daftar Ulang
                            </a>
                        </div>
                    @else
                        <div class="bg-yellow-50 border-l-4 border-yellow-500 p-6 rounded-lg">
                            <h4 class="font-bold text-yellow-800 text-lg mb-2">⚠️ Anda dinyatakan TIDAK LULUS</h4>
                            <p class="text-yellow-700 mb-4">
                                Nilai Anda belum mencapai batas minimum kelulusan (70). Anda dapat mencoba lagi di periode berikutnya.
                            </p>
                            <div class="space-x-4">
                                <a href="{{ route('user.dashboard') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-blue-700 transition">
                                    Kembali ke Dashboard
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
