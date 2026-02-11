@extends('layouts.user')

@section('content')
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-900">Test Masuk PMB 2026</h2>
                        <p class="text-gray-600 mt-2">Nomor Test: <span class="font-bold">{{ $calonMaba->nomor_test }}</span></p>
                    </div>

                    <div class="bg-blue-50 border-l-4 border-blue-500 p-6 rounded-lg mb-8">
                        <h3 class="font-bold text-blue-800 text-lg mb-3">📋 Instruksi Test</h3>
                        <ul class="space-y-2 text-blue-700">
                            <li>✅ Test terdiri dari <strong>20 soal pilihan ganda</strong></li>
                            <li>⏱️ Waktu pengerjaan: <strong>30 menit</strong></li>
                            <li>📝 Setiap soal memiliki <strong>5 pilihan jawaban (A-E)</strong></li>
                            <li>🔒 Test akan berakhir otomatis ketika waktu habis</li>
                            <li>🚫 <strong>Tidak bisa kembali ke soal sebelumnya</strong></li>
                            <li>🎯 Nilai kelulusan minimum: <strong>70</strong></li>
                        </ul>
                    </div>

                    <div class="bg-yellow-50 border-l-4 border-yellow-500 p-6 rounded-lg mb-8">
                        <h3 class="font-bold text-yellow-800 text-lg mb-3">⚠️ Perhatian</h3>
                        <ul class="space-y-2 text-yellow-700">
                            <li>Pastikan koneksi internet stabil selama test</li>
                            <li>Jangan refresh atau close browser selama test berlangsung</li>
                            <li>Test hanya bisa diikuti <strong>sekali saja</strong></li>
                            <li>Hasil akan langsung diketahui setelah test selesai</li>
                        </ul>
                    </div>

                    <div class="text-center">
                        <form action="{{ route('user.test.mulai') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="agree" required
                                           class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <span class="ml-2">Saya telah membaca dan memahami semua instruksi di atas</span>
                                </label>
                            </div>

                            <button type="submit"
                                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-10 rounded-lg text-lg transition duration-300 transform hover:scale-105">
                                MULAI TEST SEKARANG
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
