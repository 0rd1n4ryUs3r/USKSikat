@extends('layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-6">
                <h2 class="text-3xl font-bold text-gray-900">Tambah Calon Mahasiswa Baru</h2>
                <p class="text-gray-600 mt-2">Masukkan data calon mahasiswa baru</p>
            </div>

            <!-- Form Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.calon-maba.store') }}" method="POST">
                        @csrf

                        <!-- User Selection -->
                        <div class="mb-6">
                            <label for="user_id" class="block text-sm font-semibold text-gray-700 mb-2">Pilih User</label>
                            <select id="user_id" name="user_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('user_id') border-red-500 @enderror">
                                <option value="">-- Pilih User --</option>
                                @foreach ($availableUsers as $user)
                                    <option value="{{ $user->id }}" @selected(old('user_id') == $user->id)>
                                        {{ $user->name }} ({{ $user->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                            @if ($availableUsers->isEmpty())
                                <p class="text-gray-500 text-sm mt-2">Semua user sudah memiliki data calon maba</p>
                            @endif
                        </div>

                        <!-- Nomor Test -->
                        <div class="mb-6">
                            <label for="nomor_test" class="block text-sm font-semibold text-gray-700 mb-2">Nomor Test (Opsional)</label>
                            <input type="text" id="nomor_test" name="nomor_test"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nomor_test') border-red-500 @enderror"
                                value="{{ old('nomor_test') }}"
                                placeholder="Kosongkan untuk auto-generate">
                            <p class="text-gray-500 text-sm mt-2">Jika kosong, sistem akan auto-generate nomor test</p>
                            @error('nomor_test')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="flex gap-4">
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-semibold">
                                <i class="fas fa-save mr-2"></i> Simpan
                            </button>
                            <a href="{{ route('admin.calon-maba.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400 transition font-semibold">
                                <i class="fas fa-times mr-2"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
