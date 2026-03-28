@extends('layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-6">Tambah Soal Test Baru</h2>

                    <form action="{{ route('admin.soal-test.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-6">
                            <label for="pertanyaan" class="block text-sm font-semibold text-gray-700 mb-2">Pertanyaan</label>
                            <textarea id="pertanyaan" name="pertanyaan" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('pertanyaan') border-red-500 @enderror" required>{{ old('pertanyaan') }}</textarea>
                            @error('pertanyaan') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div>
                                <label for="pilihan_a" class="block text-sm font-semibold text-gray-700 mb-2">Pilihan A</label>
                                <input type="text" id="pilihan_a" name="pilihan_a" value="{{ old('pilihan_a') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('pilihan_a') border-red-500 @enderror" required>
                                @error('pilihan_a') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="pilihan_b" class="block text-sm font-semibold text-gray-700 mb-2">Pilihan B</label>
                                <input type="text" id="pilihan_b" name="pilihan_b" value="{{ old('pilihan_b') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('pilihan_b') border-red-500 @enderror" required>
                                @error('pilihan_b') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="pilihan_c" class="block text-sm font-semibold text-gray-700 mb-2">Pilihan C</label>
                                <input type="text" id="pilihan_c" name="pilihan_c" value="{{ old('pilihan_c') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('pilihan_c') border-red-500 @enderror" required>
                                @error('pilihan_c') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="pilihan_d" class="block text-sm font-semibold text-gray-700 mb-2">Pilihan D</label>
                                <input type="text" id="pilihan_d" name="pilihan_d" value="{{ old('pilihan_d') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('pilihan_d') border-red-500 @enderror" required>
                                @error('pilihan_d') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="pilihan_e" class="block text-sm font-semibold text-gray-700 mb-2">Pilihan E (Opsional)</label>
                            <input type="text" id="pilihan_e" name="pilihan_e" value="{{ old('pilihan_e') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('pilihan_e') border-red-500 @enderror">
                            @error('pilihan_e') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                            <div>
                                <label for="jawaban_benar" class="block text-sm font-semibold text-gray-700 mb-2">Jawaban Benar</label>
                                <select id="jawaban_benar" name="jawaban_benar" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('jawaban_benar') border-red-500 @enderror" required>
                                    <option value="">Pilih</option>
                                    <option value="a" @selected(old('jawaban_benar') == 'a')>A</option>
                                    <option value="b" @selected(old('jawaban_benar') == 'b')>B</option>
                                    <option value="c" @selected(old('jawaban_benar') == 'c')>C</option>
                                    <option value="d" @selected(old('jawaban_benar') == 'd')>D</option>
                                    <option value="e" @selected(old('jawaban_benar') == 'e')>E</option>
                                </select>
                                @error('jawaban_benar') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="kategori" class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                                <select id="kategori" name="kategori" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('kategori') border-red-500 @enderror" required>
                                    <option value="">Pilih</option>
                                    <option value="matematika" @selected(old('kategori') == 'matematika')>Matematika</option>
                                    <option value="bahasa_inggris" @selected(old('kategori') == 'bahasa_inggris')>Bahasa Inggris</option>
                                    <option value="logika" @selected(old('kategori') == 'logika')>Logika</option>
                                    <option value="umum" @selected(old('kategori') == 'umum')>Umum</option>
                                </select>
                                @error('kategori') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="tingkat_kesulitan" class="block text-sm font-semibold text-gray-700 mb-2">Tingkat Kesulitan</label>
                                <select id="tingkat_kesulitan" name="tingkat_kesulitan" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('tingkat_kesulitan') border-red-500 @enderror" required>
                                    <option value="">Pilih</option>
                                    <option value="mudah" @selected(old('tingkat_kesulitan') == 'mudah')>Mudah</option>
                                    <option value="sedang" @selected(old('tingkat_kesulitan') == 'sedang')>Sedang</option>
                                    <option value="sulit" @selected(old('tingkat_kesulitan') == 'sulit')>Sulit</option>
                                </select>
                                @error('tingkat_kesulitan') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="gambar" class="block text-sm font-semibold text-gray-700 mb-2">Gambar (Opsional)</label>
                            <input type="file" id="gambar" name="gambar" accept="image/*" class="w-full text-sm text-gray-700" />
                            @error('gambar') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-6">
                            <label for="penjelasan" class="block text-sm font-semibold text-gray-700 mb-2">Penjelasan (Opsional)</label>
                            <textarea id="penjelasan" name="penjelasan" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('penjelasan') border-red-500 @enderror">{{ old('penjelasan') }}</textarea>
                            @error('penjelasan') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex gap-3">
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-semibold">Simpan</button>
                            <a href="{{ route('admin.soal-test.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400 transition font-semibold">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
