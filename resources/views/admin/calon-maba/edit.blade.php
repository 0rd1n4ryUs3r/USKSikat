@extends('layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-6">
                <h2 class="text-3xl font-bold text-gray-900">Edit Calon Mahasiswa Baru</h2>
                <p class="text-gray-600 mt-2">{{ $calonMaba->user->name ?? '-' }} ({{ $calonMaba->user->email ?? '-' }})</p>
            </div>

            <!-- Form Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.calon-maba.update', $calonMaba) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <!-- Nomor Test -->
                        <div class="mb-6">
                            <label for="nomor_test" class="block text-sm font-semibold text-gray-700 mb-2">Nomor Test</label>
                            <input type="text" id="nomor_test" name="nomor_test" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nomor_test') border-red-500 @enderror"
                                value="{{ old('nomor_test', $calonMaba->nomor_test) }}">
                            @error('nomor_test')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status Test -->
                        <div class="mb-6">
                            <label for="status_test" class="block text-sm font-semibold text-gray-700 mb-2">Status Test</label>
                            <select id="status_test" name="status_test" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('status_test') border-red-500 @enderror">
                                <option value="">-- Pilih Status --</option>
                                <option value="belum" @selected(old('status_test', $calonMaba->status_test) === 'belum')>Belum</option>
                                <option value="lulus" @selected(old('status_test', $calonMaba->status_test) === 'lulus')>Lulus</option>
                                <option value="tidak_lulus" @selected(old('status_test', $calonMaba->status_test) === 'tidak_lulus')>Tidak Lulus</option>
                            </select>
                            @error('status_test')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nilai Test -->
                        <div class="mb-6">
                            <label for="nilai_test" class="block text-sm font-semibold text-gray-700 mb-2">Nilai Test</label>
                            <input type="number" id="nilai_test" name="nilai_test" min="0" max="100" step="0.01"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nilai_test') border-red-500 @enderror"
                                value="{{ old('nilai_test', $calonMaba->nilai_test) }}"
                                placeholder="0 - 100">
                            @error('nilai_test')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status Daftar Ulang -->
                        <div class="mb-6">
                            <label for="status_daftar_ulang" class="block text-sm font-semibold text-gray-700 mb-2">Status Daftar Ulang</label>
                            <select id="status_daftar_ulang" name="status_daftar_ulang" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('status_daftar_ulang') border-red-500 @enderror">
                                <option value="">-- Pilih Status --</option>
                                <option value="belum" @selected(old('status_daftar_ulang', $calonMaba->status_daftar_ulang) === 'belum')>Belum</option>
                                <option value="lengkap" @selected(old('status_daftar_ulang', $calonMaba->status_daftar_ulang) === 'lengkap')>Lengkap</option>
                            </select>
                            @error('status_daftar_ulang')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- NIM -->
                        <div class="mb-6">
                            <label for="nim" class="block text-sm font-semibold text-gray-700 mb-2">NIM (Nomor Induk Mahasiswa)</label>
                            <input type="text" id="nim" name="nim" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nim') border-red-500 @enderror"
                                value="{{ old('nim', $calonMaba->nim) }}"
                                placeholder="Nomor Induk Mahasiswa">
                            @error('nim')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="flex gap-4">
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-semibold">
                                <i class="fas fa-save mr-2"></i> Update
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
