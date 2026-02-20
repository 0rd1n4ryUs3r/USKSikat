@extends('layouts.user')

@section('content')
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-center">
                    <h2 class="text-2xl font-bold mb-4">NIM Anda</h2>

                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
                    @endif

                    <p class="text-lg">Nomor Induk Mahasiswa (NIM):</p>
                    <div class="mt-4 text-3xl font-bold">{{ $calon->nim }}</div>

                    <div class="mt-6">
                        <a href="{{ route('user.dashboard') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg">Kembali ke Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
