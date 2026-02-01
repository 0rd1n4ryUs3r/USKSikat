@php
use Illuminate\Support\Facades\Auth;
@endphp
@extends('layouts.public')

@section('title', 'PMB 2026 - Penerimaan Mahasiswa Baru')

@section('content')
    <!-- Hero Section -->
    <section class="hero-gradient text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Penerimaan Mahasiswa Baru <br> Tahun 2026
                </h1>
                <p class="text-xl mb-8 max-w-3xl mx-auto">
                    Selamat datang di portal penerimaan mahasiswa baru. Daftarkan diri Anda sekarang dan
                    raih kesempatan menjadi bagian dari kampus impian.
                </p>
                <div class="space-x-4">
                    @if(Auth::check())
                        <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}"
                           class="bg-white text-blue-600 px-8 py-3 rounded-lg text-lg font-semibold hover:bg-gray-100 transition inline-block">
                            Dashboard Saya
                        </a>
                    @else
                        <a href="{{ route('register') }}"
                           class="bg-white text-blue-600 px-8 py-3 rounded-lg text-lg font-semibold hover:bg-gray-100 transition inline-block">
                            Daftar Sekarang
                        </a>
                        <a href="{{ route('login') }}"
                           class="border-2 border-white text-white px-8 py-3 rounded-lg text-lg font-semibold hover:bg-white hover:text-blue-600 transition inline-block">
                            Login
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="text-4xl font-bold text-blue-600 mb-2">5,000+</div>
                    <p class="text-gray-600">Pendaftar Tahun Lalu</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-green-600 mb-2">85%</div>
                    <p class="text-gray-600">Tingkat Kelulusan</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-purple-600 mb-2">24/7</div>
                    <p class="text-gray-600">Layanan Online</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20" id="jalur">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-12">Jalur Penerimaan</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="feature-card bg-white p-6 rounded-xl shadow-lg border border-gray-100">
                    <div class="w-14 h-14 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-medal text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">SNBP</h3>
                    <p class="text-gray-600">Seleksi Nasional Berdasarkan Prestasi menggunakan nilai rapor dan portofolio.</p>
                </div>

                <div class="feature-card bg-white p-6 rounded-xl shadow-lg border border-gray-100">
                    <div class="w-14 h-14 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-pencil-alt text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">SNBT</h3>
                    <p class="text-gray-600">Seleksi Nasional Berdasarkan Tes dengan ujian tulis berbasis komputer.</p>
                </div>

                <div class="feature-card bg-white p-6 rounded-xl shadow-lg border border-gray-100">
                    <div class="w-14 h-14 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-university text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Mandiri</h3>
                    <p class="text-gray-600">Seleksi mandiri yang diselenggarakan langsung oleh universitas.</p>
                </div>

                <div class="feature-card bg-white p-6 rounded-xl shadow-lg border border-gray-100">
                    <div class="w-14 h-14 bg-yellow-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-trophy text-yellow-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Prestasi</h3>
                    <p class="text-gray-600">Jalur khusus untuk siswa berprestasi di bidang akademik/non-akademik.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How to Register Section -->
    <section class="py-20 bg-gray-50" id="jadwal">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-12">Cara Pendaftaran</h2>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="step-icon rounded-full flex items-center justify-center text-white font-bold text-2xl mx-auto mb-4">
                        1
                    </div>
                    <h3 class="font-bold mb-2">Registrasi Akun</h3>
                    <p class="text-gray-600">Buat akun dengan email dan password Anda.</p>
                </div>

                <div class="text-center">
                    <div class="step-icon rounded-full flex items-center justify-center text-white font-bold text-2xl mx-auto mb-4">
                        2
                    </div>
                    <h3 class="font-bold mb-2">Lengkapi Data</h3>
                    <p class="text-gray-600">Isi formulir data diri dan upload dokumen.</p>
                </div>

                <div class="text-center">
                    <div class="step-icon rounded-full flex items-center justify-center text-white font-bold text-2xl mx-auto mb-4">
                        3
                    </div>
                    <h3 class="font-bold mb-2">Ikuti Tes Online</h3>
                    <p class="text-gray-600">Kerjakan tes masuk sesuai jadwal yang ditentukan.</p>
                </div>

                <div class="text-center">
                    <div class="step-icon rounded-full flex items-center justify-center text-white font-bold text-2xl mx-auto mb-4">
                        4
                    </div>
                    <h3 class="font-bold mb-2">Daftar Ulang</h3>
                    <p class="text-gray-600">Lakukan daftar ulang jika dinyatakan lulus.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-12">Jadwal Penting</h2>

            <div class="relative">
                <!-- Timeline line -->
                <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-blue-200 hidden md:block"></div>

                <!-- Timeline items -->
                <div class="space-y-12">
                    <!-- Item 1 -->
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="md:w-1/2 md:pr-12 md:text-right mb-4 md:mb-0">
                            <div class="bg-blue-600 text-white p-4 rounded-lg inline-block">
                                <h3 class="font-bold">Pendaftaran Dibuka</h3>
                                <p class="text-sm">1 Februari - 31 Maret 2026</p>
                            </div>
                        </div>
                        <div class="hidden md:block w-8 h-8 bg-blue-600 rounded-full z-10"></div>
                        <div class="md:w-1/2 md:pl-12">
                            <!-- Empty for alignment -->
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="md:w-1/2 md:pr-12 md:text-right">
                            <!-- Empty for alignment -->
                        </div>
                        <div class="hidden md:block w-8 h-8 bg-green-600 rounded-full z-10"></div>
                        <div class="md:w-1/2 md:pl-12 mb-4 md:mb-0">
                            <div class="bg-green-600 text-white p-4 rounded-lg inline-block">
                                <h3 class="font-bold">Tes Online</h3>
                                <p class="text-sm">10 - 20 April 2026</p>
                            </div>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="md:w-1/2 md:pr-12 md:text-right mb-4 md:mb-0">
                            <div class="bg-purple-600 text-white p-4 rounded-lg inline-block">
                                <h3 class="font-bold">Pengumuman Hasil</h3>
                                <p class="text-sm">5 Mei 2026</p>
                            </div>
                        </div>
                        <div class="hidden md:block w-8 h-8 bg-purple-600 rounded-full z-10"></div>
                        <div class="md:w-1/2 md:pl-12">
                            <!-- Empty for alignment -->
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="md:w-1/2 md:pr-12 md:text-right">
                            <!-- Empty for alignment -->
                        </div>
                        <div class="hidden md:block w-8 h-8 bg-yellow-600 rounded-full z-10"></div>
                        <div class="md:w-1/2 md:pl-12 mb-4 md:mb-0">
                            <div class="bg-yellow-600 text-white p-4 rounded-lg inline-block">
                                <h3 class="font-bold">Daftar Ulang</h3>
                                <p class="text-sm">10 - 30 Mei 2026</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-blue-500 to-purple-600 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold mb-6">Siap Memulai Perjalanan Akademik Anda?</h2>
            <p class="text-xl mb-8">Bergabunglah dengan ribuan mahasiswa lainnya yang telah memulai karir mereka di kampus kami.</p>
            <a href="{{ route('register') }}"
               class="bg-white text-blue-600 px-10 py-4 rounded-lg text-lg font-bold hover:bg-gray-100 transition inline-block">
                DAFTAR SEKARANG GRATIS
            </a>
            <p class="mt-4 text-sm opacity-90">Pendaftaran tidak dipungut biaya</p>
        </div>
    </section>
@endsection
