@extends('layouts.public')

@section('title', 'Tentang PMB 2026')

@section('content')
<div class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold mb-8">Tentang PMB 2026</h1>

        <div class="bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-bold mb-6">Sistem Penerimaan Mahasiswa Baru</h2>

            <div class="prose max-w-none">
                <p class="text-lg mb-6">
                    Sistem Penerimaan Mahasiswa Baru (PMB) Tahun 2026 adalah platform digital yang dirancang
                    untuk mempermudah proses seleksi dan penerimaan mahasiswa baru di perguruan tinggi.
                </p>

                <h3 class="text-xl font-bold mt-8 mb-4">Fitur Utama</h3>
                <ul class="list-disc pl-6 mb-6 space-y-2">
                    <li><strong>Pendaftaran Online:</strong> Calon mahasiswa dapat mendaftar dari mana saja tanpa harus datang ke kampus.</li>
                    <li><strong>Tes Online Terintegrasi:</strong> Sistem ujian berbasis komputer dengan pengawasan real-time.</li>
                    <li><strong>Pengumuman Real-time:</strong> Hasil seleksi dapat dilihat langsung melalui dashboard.</li>
                    <li><strong>Daftar Ulang Digital:</strong> Proses administrasi dapat diselesaikan secara online.</li>
                    <li><strong>Monitoring Admin:</strong> Administrator dapat memantau seluruh proses pendaftaran.</li>
                </ul>

                <h3 class="text-xl font-bold mt-8 mb-4">Tujuan Sistem</h3>
                <p class="mb-4">
                    Sistem ini bertujuan untuk:
                </p>
                <ol class="list-decimal pl-6 mb-6 space-y-2">
                    <li>Meningkatkan efisiensi proses penerimaan mahasiswa baru</li>
                    <li>Mengurangi penggunaan kertas (paperless)</li>
                    <li>Memberikan transparansi dalam proses seleksi</li>
                    <li>Mempermudah akses bagi calon mahasiswa dari seluruh daerah</li>
                    <li>Menyediakan data yang terintegrasi untuk pengambilan keputusan</li>
                </ol>

                <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mt-8 rounded">
                    <h4 class="font-bold text-blue-800 mb-2">Informasi Penting</h4>
                    <p class="text-blue-700">
                        Sistem ini menggunakan teknologi terbaru untuk memastikan keamanan dan kenyamanan
                        selama proses pendaftaran. Semua data pribadi akan dijaga kerahasiaannya.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
