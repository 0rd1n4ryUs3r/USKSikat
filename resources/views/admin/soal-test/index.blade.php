@extends('layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Kelola Soal Test</h2>
                    <p class="text-gray-600 mt-2">Daftar semua soal test</p>
                </div>
                <a href="{{ route('admin.soal-test.create') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">Tambah Soal</a>
            </div>

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto p-6">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-gray-100 text-gray-700 font-semibold">
                            <tr>
                                <th class="px-4 py-3">No</th>
                                <th class="px-4 py-3">Pertanyaan</th>
                                <th class="px-4 py-3">Kategori</th>
                                <th class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($soalTests as $index => $soal)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-4 py-3">{{ ($soalTests->currentPage() - 1) * $soalTests->perPage() + $loop->iteration }}</td>
                                    <td class="px-4 py-3">{{ \Illuminate\Support\Str::limit($soal->pertanyaan, 80) }}</td>
                                    <td class="px-4 py-3">
                                        <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $soal->kategori == 'matematika' ? 'bg-blue-100 text-blue-800' : ($soal->kategori == 'bahasa_inggris' ? 'bg-indigo-100 text-indigo-800' : ($soal->kategori == 'logika' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-700')) }}">
                                            {{ ucfirst(str_replace('_', ' ', $soal->kategori)) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex gap-2">
                                            <a href="{{ route('admin.soal-test.edit', $soal) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                                            <form action="{{ route('admin.soal-test.destroy', $soal) }}" method="POST" onsubmit="return confirm('Hapus soal test {{ $soal->id }}?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-8 text-center text-gray-500">Belum ada soal test.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4">{{ $soalTests->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
