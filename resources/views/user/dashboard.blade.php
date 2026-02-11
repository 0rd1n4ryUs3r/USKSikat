@extends('layouts.user')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-6">Selamat Datang, {{ Auth::user()->name }}!</h2>

                    <!-- Status Card -->
                    <div class="mb-8">
                        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded">
                            <h3 class="font-bold text-blue-800">Status Pendaftaran</h3>
                            <div class="mt-2 space-y-2">
                                <div class="flex items-center">
                                    <span class="inline-block w-3 h-3 bg-green-500 rounded-full mr-2"></span>
                                    <span>Registrasi: <strong>Selesai</strong></span>
                                </div>
                                <div class="flex items-center">
                                    <span class="inline-block w-3 h-3 bg-gray-300 rounded-full mr-2"></span>
                                    <span>Test Masuk: <strong>Belum diikuti</strong></span>
                                </div>
                                <div class="flex items-center">
                                    <span class="inline-block w-3 h-3 bg-gray-300 rounded-full mr-2"></span>
                                    <span>Daftar Ulang: <strong>Belum dilakukan</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Progress Steps -->
                    <div class="mb-8">
                        <h3 class="text-xl font-bold mb-4">Proses Pendaftaran</h3>
                        <div class="flex items-center justify-between">
                            <div class="text-center">
                                <div class="w-12 h-12 bg-green-500 text-white rounded-full flex items-center justify-center mx-auto">
                                    1
                                </div>
                                <p class="mt-2 font-medium">Registrasi</p>
                                <p class="text-sm text-green-600">Selesai</p>
                            </div>

                            <div class="flex-1 h-1 bg-gray-300 mx-4"></div>

                            <div class="text-center">
                                <div class="w-12 h-12 bg-gray-300 text-gray-600 rounded-full flex items-center justify-center mx-auto">
                                    2
                                </div>
                                <p class="mt-2 font-medium">Test Masuk</p>
                                <p class="text-sm text-gray-500">Menunggu</p>
                            </div>

                            <div class="flex-1 h-1 bg-gray-300 mx-4"></div>

                            <div class="text-center">
                                <div class="w-12 h-12 bg-gray-300 text-gray-600 rounded-full flex items-center justify-center mx-auto">
                                    3
                                </div>
                                <p class="mt-2 font-medium">Hasil</p>
                                <p class="text-sm text-gray-500">-</p>
                            </div>

                            <div class="flex-1 h-1 bg-gray-300 mx-4"></div>

                            <div class="text-center">
                                <div class="w-12 h-12 bg-gray-300 text-gray-600 rounded-full flex items-center justify-center mx-auto">
                                    4
                                </div>
                                <p class="mt-2 font-medium">Daftar Ulang</p>
                                <p class="text-sm text-gray-500">-</p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div>
                        <h3 class="text-xl font-bold mb-4">Menu Utama</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <a href="{{ route('user.test.index') }}" class="bg-blue-600 text-white p-6 rounded-lg hover:bg-blue-700 transition text-center">
                                <i class="fas fa-file-alt text-2xl mb-2"></i>
                                <h4 class="font-bold">Ikuti Test Masuk</h4>
                                <p class="text-sm mt-2">Uji kemampuan untuk masuk ke perguruan tinggi</p>
                            </a>

                            <a href="#" class="bg-green-600 text-white p-6 rounded-lg hover:bg-green-700 transition text-center">
                                <i class="fas fa-chart-line text-2xl mb-2"></i>
                                <h4 class="font-bold">Lihat Hasil Test</h4>
                                <p class="text-sm mt-2">Cek nilai dan status kelulusan</p>
                            </a>

                            <a href="#" class="bg-yellow-600 text-white p-6 rounded-lg hover:bg-yellow-700 transition text-center">
                                <i class="fas fa-clipboard-check text-2xl mb-2"></i>
                                <h4 class="font-bold">Daftar Ulang</h4>
                                <p class="text-sm mt-2">Lengkapi data dan dokumen</p>
                            </a>

                            <a href="#" class="bg-purple-600 text-white p-6 rounded-lg hover:bg-purple-700 transition text-center">
                                <i class="fas fa-id-card text-2xl mb-2"></i>
                                <h4 class="font-bold">Ambil NIM</h4>
                                <p class="text-sm mt-2">Dapatkan Nomor Induk Mahasiswa</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
