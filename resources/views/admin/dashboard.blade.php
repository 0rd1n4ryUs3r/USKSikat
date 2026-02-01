@extends('layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-6">Admin Dashboard - Penerimaan Mahasiswa Baru</h2>

                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                        <div class="bg-blue-50 p-6 rounded-lg shadow">
                            <h3 class="text-lg font-semibold text-blue-800">Total Pendaftar</h3>
                            <p class="text-3xl font-bold text-blue-600 mt-2">0</p>
                            <p class="text-sm text-blue-500 mt-1">Calon Maba</p>
                        </div>

                        <div class="bg-green-50 p-6 rounded-lg shadow">
                            <h3 class="text-lg font-semibold text-green-800">Lulus Test</h3>
                            <p class="text-3xl font-bold text-green-600 mt-2">0</p>
                            <p class="text-sm text-green-500 mt-1">Mahasiswa</p>
                        </div>

                        <div class="bg-yellow-50 p-6 rounded-lg shadow">
                            <h3 class="text-lg font-semibold text-yellow-800">Daftar Ulang</h3>
                            <p class="text-3xl font-bold text-yellow-600 mt-2">0</p>
                            <p class="text-sm text-yellow-500 mt-1">Sudah lengkap</p>
                        </div>

                        <div class="bg-purple-50 p-6 rounded-lg shadow">
                            <h3 class="text-lg font-semibold text-purple-800">Soal Test</h3>
                            <p class="text-3xl font-bold text-purple-600 mt-2">0</p>
                            <p class="text-sm text-purple-500 mt-1">Tersedia</p>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="mb-8">
                        <h3 class="text-xl font-bold mb-4">Quick Actions</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <a href="#" class="bg-blue-600 text-white p-4 rounded-lg hover:bg-blue-700 transition text-center">
                                <i class="fas fa-user-plus mr-2"></i> Tambah Calon Maba
                            </a>
                            <a href="#" class="bg-green-600 text-white p-4 rounded-lg hover:bg-green-700 transition text-center">
                                <i class="fas fa-question-circle mr-2"></i> Kelola Soal Test
                            </a>
                            <a href="#" class="bg-purple-600 text-white p-4 rounded-lg hover:bg-purple-700 transition text-center">
                                <i class="fas fa-list mr-2"></i> Lihat Hasil Test
                            </a>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div>
                        <h3 class="text-xl font-bold mb-4">Recent Activity</h3>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="text-gray-600">Belum ada aktivitas terbaru.</p>
                            <p class="text-sm text-gray-500 mt-2">Sistem siap digunakan untuk mengelola penerimaan mahasiswa baru.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
