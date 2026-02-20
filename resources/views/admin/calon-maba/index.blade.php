@extends('layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Data Calon Mahasiswa Baru</h2>
                    <p class="text-gray-600 mt-2">Kelola data calon pemangku maba</p>
                </div>
                <a href="{{ route('admin.calon-maba.create') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                    <i class="fas fa-plus mr-2"></i> Tambah Calon Maba
                </a>
            </div>

            <!-- Success Alert -->
            @if (session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-4 rounded-lg flex items-start">
                    <i class="fas fa-check-circle mt-0.5 mr-3"></i>
                    <div>
                        <h3 class="font-semibold">Berhasil!</h3>
                        <p>{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <!-- Table Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($calonMaba->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-100 border-b">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">No</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Nama</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Email</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Nomor Test</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Status Test</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Nilai</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Daftar Ulang</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">NIM</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($calonMaba as $index => $calon)
                                        <tr class="border-b hover:bg-gray-50 transition">
                                            <td class="px-6 py-4 text-sm text-gray-700">{{ ($calonMaba->currentPage() - 1) * $calonMaba->perPage() + $loop->iteration }}</td>
                                            <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                                {{ $calon->user->name ?? '-' }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-700">
                                                {{ $calon->user->email ?? '-' }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-700">
                                                {{ $calon->nomor_test ?? '-' }}
                                            </td>
                                            <td class="px-6 py-4 text-sm">
                                                @if ($calon->status_test === 'belum')
                                                    <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-semibold">Belum</span>
                                                @elseif ($calon->status_test === 'lulus')
                                                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">Lulus</span>
                                                @else
                                                    <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-xs font-semibold">Tidak Lulus</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-700">
                                                @if ($calon->nilai_test !== null)
                                                    <span class="font-semibold">{{ $calon->nilai_test }}</span>
                                                @else
                                                    <span class="text-gray-400">-</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-sm">
                                                @if ($calon->status_daftar_ulang === 'lengkap')
                                                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">Lengkap</span>
                                                @else
                                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-semibold">Belum</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-sm font-semibold text-gray-900">
                                                {{ $calon->nim ?? '-' }}
                                            </td>
                                            <td class="px-6 py-4 text-sm">
                                                <div class="flex gap-2">
                                                    <a href="{{ route('admin.calon-maba.edit', $calon) }}" class="text-blue-600 hover:text-blue-900 transition">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.calon-maba.destroy', $calon) }}" method="POST" class="inline-block"
                                                        onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-900 transition">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="mt-6">
                            {{ $calonMaba->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <i class="fas fa-inbox text-gray-300 text-4xl mb-4"></i>
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Tidak ada data</h3>
                            <p class="text-gray-500 mb-6">Mulai tambahkan calon mahasiswa baru</p>
                            <a href="{{ route('admin.calon-maba.create') }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                                <i class="fas fa-plus mr-2"></i> Tambah Calon Maba
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
