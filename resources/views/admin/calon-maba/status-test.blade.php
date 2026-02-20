@extends('layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">List User Berdasarkan Status Test</h2>
                    <p class="text-gray-600 mt-2">Total: <strong>{{ $calonMaba->total() }}</strong> orang</p>
                </div>
                <a href="{{ route('admin.dashboard') }}" class="bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
            </div>

            <!-- Filter Tabs -->
            <div class="mb-6 flex gap-3 border-b border-gray-200">
                <a href="{{ route('admin.calon-maba.status-test', ['status' => 'lulus']) }}"
                   class="px-4 py-3 font-semibold transition {{ $statusFilter === 'lulus' ? 'border-b-2 border-green-600 text-green-600' : 'text-gray-600 hover:text-gray-900' }}">
                    <i class="fas fa-check-circle mr-2"></i> Lulus
                </a>
                <a href="{{ route('admin.calon-maba.status-test', ['status' => 'tidak_lulus']) }}"
                   class="px-4 py-3 font-semibold transition {{ $statusFilter === 'tidak_lulus' ? 'border-b-2 border-red-600 text-red-600' : 'text-gray-600 hover:text-gray-900' }}">
                    <i class="fas fa-times-circle mr-2"></i> Tidak Lulus
                </a>
                <a href="{{ route('admin.calon-maba.status-test', ['status' => 'belum']) }}"
                   class="px-4 py-3 font-semibold transition {{ $statusFilter === 'belum' ? 'border-b-2 border-yellow-600 text-yellow-600' : 'text-gray-600 hover:text-gray-900' }}">
                    <i class="fas fa-info-circle mr-2"></i> Belum
                </a>
            </div>

            <!-- Table Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($calonMaba->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="border-b" style="background-color: {{ $statusFilter === 'lulus' ? '#dcfce7' : ($statusFilter === 'tidak_lulus' ? '#fee2e2' : '#fef3c7') }};">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase">No</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Nama</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Email</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Nomor Test</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Nilai Test</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Aksi</th>
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
                                            <td class="px-6 py-4 text-sm">
                                                @if ($calon->nilai_test !== null)
                                                    <div class="flex items-center gap-2">
                                                        <span class="font-bold text-lg">{{ $calon->nilai_test }}</span>
                                                        <div class="w-12 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                                            <div class="h-full" style="width: {{ min($calon->nilai_test, 100) }}%; background-color: {{ $calon->nilai_test >= 70 ? '#10b981' : '#ef4444' }};"></div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <span class="text-gray-400">-</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-sm">
                                                @if ($statusFilter === 'lulus')
                                                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">
                                                        <i class="fas fa-check-circle mr-1"></i> Lulus
                                                    </span>
                                                @elseif ($statusFilter === 'tidak_lulus')
                                                    <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-xs font-semibold">
                                                        <i class="fas fa-times-circle mr-1"></i> Tidak Lulus
                                                    </span>
                                                @else
                                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-semibold">
                                                        <i class="fas fa-info-circle mr-1"></i> Belum
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-sm">
                                                <a href="{{ route('admin.calon-maba.edit', $calon) }}" class="text-blue-600 hover:underline font-semibold">
                                                    <i class="fas fa-edit mr-1"></i> Edit
                                                </a>
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
                            <p class="text-gray-600 mt-2">Tidak ada user dengan status ini</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
