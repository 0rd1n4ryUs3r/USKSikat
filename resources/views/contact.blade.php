@extends('layouts.public')

@section('title', 'Kontak PMB 2026')

@section('content')
<div class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold mb-8">Hubungi Kami</h1>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <h2 class="text-2xl font-bold mb-6">Kirim Pesan</h2>

                <form action="#" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" id="name" name="name"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               required>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" id="email" name="email"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               required>
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subjek</label>
                        <input type="text" id="subject" name="subject"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               required>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
                        <textarea id="message" name="message" rows="6"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                  required></textarea>
                    </div>

                    <button type="submit"
                            class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition">
                        Kirim Pesan
                    </button>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="space-y-8">
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold mb-6">Informasi Kontak</h2>

                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-map-marker-alt text-blue-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg">Alamat</h3>
                                <p class="text-gray-600">Gedung Rektorat Lantai 2<br>
                                Jl. Pendidikan No. 1, Jakarta 12345</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-phone text-green-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg">Telepon</h3>
                                <p class="text-gray-600">(021) 1234-5678<br>
                                (021) 9876-5432</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-envelope text-purple-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg">Email</h3>
                                <p class="text-gray-600">pmb@university.ac.id<br>
                                info.pmb@university.ac.id</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-clock text-yellow-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg">Jam Operasional</h3>
                                <p class="text-gray-600">Senin - Jumat: 08:00 - 16:00 WIB<br>
                                Sabtu: 08:00 - 12:00 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold mb-6">FAQ</h2>

                    <div class="space-y-4">
                        <details class="border border-gray-200 rounded-lg p-4">
                            <summary class="font-bold cursor-pointer">Bagaimana cara mendaftar?</summary>
                            <p class="mt-2 text-gray-600">Klik tombol "Daftar Sekarang" di beranda, isi formulir pendaftaran, dan verifikasi email Anda.</p>
                        </details>

                        <details class="border border-gray-200 rounded-lg p-4">
                            <summary class="font-bold cursor-pointer">Apakah ada biaya pendaftaran?</summary>
                            <p class="mt-2 text-gray-600">Tidak, pendaftaran PMB 2026 sepenuhnya gratis tanpa biaya apapun.</p>
                        </details>

                        <details class="border border-gray-200 rounded-lg p-4">
                            <summary class="font-bold cursor-pointer">Dokumen apa yang diperlukan?</summary>
                            <p class="mt-2 text-gray-600">FC Ijazah, FC SKHUN, FC KTP, Pas foto, dan dokumen pendukung lainnya.</p>
                        </details>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
