@extends('layouts.user')

@section('content')
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">
                    <h2 class="text-2xl font-bold mb-4">Form Daftar Ulang</h2>

                    @if(session('error'))
                        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">{{ session('error') }}</div>
                    @endif

                    <p class="mb-4">Nomor Test: <strong>{{ $calon->nomor_test ?? '-' }}</strong></p>

                    <form action="{{ route('user.daftar-ulang.submit') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="agree" value="1" required class="rounded border-gray-300">
                                <span class="ml-2">Saya menyatakan bahwa data dan dokumen yang saya lampirkan sudah benar.</span>
                            </label>
                        </div>

                        <div class="flex items-center space-x-4">
                            <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-lg">Kirim Daftar Ulang</button>
                            <a href="{{ route('user.dashboard') }}" class="text-gray-600">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
