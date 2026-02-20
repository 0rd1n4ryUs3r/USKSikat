@extends('layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">List User Yang Sudah Mendaftar</h2>
                    <p class="text-gray-600 mt-2">Total pendaftar: <strong>{{ $calonMaba->total() }}</strong> orang</p>
                </div>
                <a href="{{ route('admin.dashboard') }}" class="bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
            </div>

            <!-- Table Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($calonMaba->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-blue-50 border-b">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-blue-900 uppercase">No</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-blue-900 uppercase">Nama</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-blue-900 uppercase">Email</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-blue-900 uppercase">Nomor Test</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-blue-900 uppercase">Tanggal Daftar</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-blue-900 uppercase">Status</th>
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
                                                <a href="mailto:{{ $calon->user->email ?? '#' }}" class="text-blue-600 hover:underline">
                                                    {{ $calon->user->email ?? '-' }}
                                                </a>
                                            </td>
                                            <td class="px-6 py-4 text-sm font-mono text-gray-700">
                                                {{ $calon->nomor_test ?? '-' }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-700">
                                                {{ $calon->created_at?->format('d M Y') ?? '-' }}
                                            </td>
                                            <td class="px-6 py-4 text-sm">
                                                <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-semibold">
                                                    <i class="fas fa-check-circle mr-1"></i> Terdaftar
                                                </span>
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
                            <i class="fas fa-inbox text-gray-400 text-5xl mb-4"></i>
                            <h3 class="text-lg font-semibold text-gray-900">Belum Ada Data</h3>
                            <p class="text-gray-600 mt-2">Tidak ada user yang terdaftar saat ini</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
