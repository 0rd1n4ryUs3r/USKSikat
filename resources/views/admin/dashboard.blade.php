@extends('layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-6">Admin Dashboard - Penerimaan Mahasiswa Baru</h2>

                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                        <div class="bg-blue-50 p-6 rounded-lg shadow hover:shadow-lg transition cursor-pointer">
                            <h3 class="text-lg font-semibold text-blue-800">Total Pendaftar</h3>
                            <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalPendaftar }}</p>
                            <p class="text-sm text-blue-500 mt-1">Calon Maba</p>
                        </div>

                        <div class="bg-green-50 p-6 rounded-lg shadow hover:shadow-lg transition cursor-pointer">
                            <h3 class="text-lg font-semibold text-green-800">Lulus Test</h3>
                            <p class="text-3xl font-bold text-green-600 mt-2">{{ $totalLulus }}</p>
                            <p class="text-sm text-green-500 mt-1">Mahasiswa</p>
                        </div>

                        <div class="bg-yellow-50 p-6 rounded-lg shadow hover:shadow-lg transition cursor-pointer">
                            <h3 class="text-lg font-semibold text-yellow-800">Daftar Ulang</h3>
                            <p class="text-3xl font-bold text-yellow-600 mt-2">{{ $totalDaftarUlang }}</p>
                            <p class="text-sm text-yellow-500 mt-1">Sudah lengkap</p>
                        </div>

                        <div class="bg-purple-50 p-6 rounded-lg shadow hover:shadow-lg transition cursor-pointer">
                            <h3 class="text-lg font-semibold text-purple-800">Soal Test</h3>
                            <p class="text-3xl font-bold text-purple-600 mt-2">{{ $totalSoal }}</p>
                            <p class="text-sm text-purple-500 mt-1">Tersedia</p>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="mb-8">
                        <h3 class="text-xl font-bold mb-4">Quick Actions</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <a href="{{ route('admin.calon-maba.create') }}" class="bg-blue-600 text-white p-4 rounded-lg hover:bg-blue-700 transition text-center font-semibold">
                                <i class="fas fa-user-plus mr-2"></i> Tambah Calon Maba
                            </a>
                            <a href="{{ route('admin.calon-maba.index') }}" class="bg-green-600 text-white p-4 rounded-lg hover:bg-green-700 transition text-center font-semibold">
                                <i class="fas fa-list mr-2"></i> Kelola Calon Maba
                            </a>
                            <a href="{{ route('admin.calon-maba.index') }}" class="bg-purple-600 text-white p-4 rounded-lg hover:bg-purple-700 transition text-center font-semibold">
                                <i class="fas fa-chart-bar mr-2"></i> Lihat Hasil
                            </a>
                        </div>
                    </div>

                    <!-- Navigation Cards -->
                    <div class="mb-8">
                        <h3 class="text-xl font-bold mb-4">Navigasi Utama</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="bg-gradient-to-br from-blue-100 to-blue-50 p-6 rounded-lg border border-blue-200">
                                <i class="fas fa-users text-blue-600 text-3xl mb-3"></i>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Data Calon Maba</h4>
                                <p class="text-gray-600 text-sm mb-4">Kelola, tambah, edit & hapus calon maba</p>
                                <a href="{{ route('admin.calon-maba.index') }}" class="text-blue-600 font-semibold hover:text-blue-800">
                                    Buka <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>

                            <div class="bg-gradient-to-br from-green-100 to-green-50 p-6 rounded-lg border border-green-200">
                                <i class="fas fa-clipboard-list text-green-600 text-3xl mb-3"></i>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">User Terdaftar</h4>
                                <p class="text-gray-600 text-sm mb-4">Lihat semua user yang sudah mendaftar</p>
                                <a href="{{ route('admin.calon-maba.terdaftar') }}" class="text-green-600 font-semibold hover:text-green-800">
                                    Lihat <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>

                            <div class="bg-gradient-to-br from-purple-100 to-purple-50 p-6 rounded-lg border border-purple-200">
                                <i class="fas fa-chart-bar text-purple-600 text-3xl mb-3"></i>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Status Test</h4>
                                <p class="text-gray-600 text-sm mb-4">Lihat user berdasarkan hasil test</p>
                                <a href="{{ route('admin.calon-maba.status-test') }}" class="text-purple-600 font-semibold hover:text-purple-800">
                                    Lihat <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>

                            <div class="bg-gradient-to-br from-yellow-100 to-yellow-50 p-6 rounded-lg border border-yellow-200">
                                <i class="fas fa-id-card text-yellow-600 text-3xl mb-3"></i>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Daftar Ulang</h4>
                                <p class="text-gray-600 text-sm mb-4">Lihat user yang sudah daftar ulang</p>
                                <a href="{{ route('admin.calon-maba.daftar-ulang') }}" class="text-yellow-600 font-semibold hover:text-yellow-800">
                                    Lihat <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>

                            <div class="bg-gradient-to-br from-red-100 to-red-50 p-6 rounded-lg border border-red-200 opacity-50 cursor-not-allowed">
                                <i class="fas fa-question-circle text-red-600 text-3xl mb-3"></i>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Kelola Soal Test</h4>
                                <p class="text-gray-600 text-sm mb-4">Tambah & edit bank soal test</p>
                                <span class="text-gray-500 font-semibold">
                                    Coming Soon <i class="fas fa-lock ml-2"></i>
                                </span>
                            </div>

                            <div class="bg-gradient-to-br from-indigo-100 to-indigo-50 p-6 rounded-lg border border-indigo-200 opacity-50 cursor-not-allowed">
                                <i class="fas fa-file-csv text-indigo-600 text-3xl mb-3"></i>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Export & Laporan</h4>
                                <p class="text-gray-600 text-sm mb-4">Export data dan buat laporan</p>
                                <span class="text-gray-500 font-semibold">
                                    Coming Soon <i class="fas fa-lock ml-2"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
