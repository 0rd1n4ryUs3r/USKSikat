<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'PMB - Penerimaan Mahasiswa Baru')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .step-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
</head>
<body class="font-sans antialiased">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-white"></i>
                        </div>
                        <span class="text-xl font-bold text-gray-800">PMB 2026</span>
                    </a>

                    <div class="hidden md:flex items-center space-x-8 ml-10">
                        <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 font-medium">Beranda</a>
                        <a href="{{ route('about') }}" class="text-gray-700 hover:text-blue-600 font-medium">Tentang</a>
                        <a href="{{ route('contact') }}" class="text-gray-700 hover:text-blue-600 font-medium">Kontak</a>
                        <a href="#jalur" class="text-gray-700 hover:text-blue-600 font-medium">Jalur Masuk</a>
                        <a href="#jadwal" class="text-gray-700 hover:text-blue-600 font-medium">Jadwal</a>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    @if(auth()->check())
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-medium">Login</a>
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                            Daftar Sekarang
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">PMB 2026</h3>
                    <p class="text-gray-400">Sistem Penerimaan Mahasiswa Baru Tahun Akademik 2026/2027.</p>
                </div>

                <div>
                    <h4 class="font-bold mb-4">Tautan Cepat</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white">Beranda</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-white">Tentang</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-white">Kontak</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">FAQ</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-4">Jalur Masuk</h4>
                    <ul class="space-y-2">
                        <li class="text-gray-400">SNBP</li>
                        <li class="text-gray-400">SNBT</li>
                        <li class="text-gray-400">Mandiri</li>
                        <li class="text-gray-400">Prestasi</li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-4">Kontak</h4>
                    <div class="space-y-2 text-gray-400">
                        <p><i class="fas fa-phone mr-2"></i> (021) 1234-5678</p>
                        <p><i class="fas fa-envelope mr-2"></i> pmb@university.ac.id</p>
                        <p><i class="fas fa-map-marker-alt mr-2"></i> Jl. Pendidikan No. 1, Jakarta</p>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2026 Penerimaan Mahasiswa Baru. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
