<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CalonMaba;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CalonMabaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $calonMaba = CalonMaba::with('user')->paginate(15);

        return view('admin.calon-maba.index', compact('calonMaba'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get users yang belum punya calon maba record
        $availableUsers = User::where('role', 'user')
            ->doesntHave('calonMaba')
            ->get();

        return view('admin.calon-maba.create', compact('availableUsers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id|unique:calon_maba,user_id',
            'nomor_test' => 'nullable|string|unique:calon_maba,nomor_test',
        ]);

        // Auto-generate nomor_test if not provided
        if (empty($validated['nomor_test'])) {
            $validated['nomor_test'] = 'TEST-'.date('Y').'-'.Str::padLeft(User::find($validated['user_id'])->id, 4, '0');
        }

        CalonMaba::create($validated);

        return redirect()->route('admin.calon-maba.index')
            ->with('success', 'Calon Maba berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CalonMaba $calonMaba)
    {
        return view('admin.calon-maba.show', compact('calonMaba'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CalonMaba $calonMaba)
    {
        return view('admin.calon-maba.edit', compact('calonMaba'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CalonMaba $calonMaba)
    {
        $validated = $request->validate([
            'nomor_test' => 'nullable|string|unique:calon_maba,nomor_test,'.$calonMaba->id,
            'status_test' => 'nullable|in:belum,lulus,tidak_lulus',
            'nilai_test' => 'nullable|numeric|min:0|max:100',
            'status_daftar_ulang' => 'nullable|in:belum,lengkap',
            'nim' => 'nullable|string|unique:calon_maba,nim,'.$calonMaba->id,
        ]);

        $calonMaba->update($validated);

        return redirect()->route('admin.calon-maba.index')
            ->with('success', 'Calon Maba berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CalonMaba $calonMaba)
    {
        $calonMaba->delete();

        return redirect()->route('admin.calon-maba.index')
            ->with('success', 'Calon Maba berhasil dihapus.');
    }

    /**
     * List User yang sudah mendaftar
     */
    public function terdaftar()
    {
        $calonMaba = CalonMaba::with('user')->paginate(15);

        return view('admin.calon-maba.terdaftar', compact('calonMaba'));
    }

    /**
     * List User berdasarkan status test
     */
    public function statusTest()
    {
        $statusFilter = request('status', 'lulus');

        $query = CalonMaba::with('user');

        if ($statusFilter === 'tidak_lulus') {
            $query->where('status_test', 'tidak_lulus');
        } elseif ($statusFilter === 'belum') {
            $query->where('status_test', 'belum');
        } else {
            $query->where('status_test', 'lulus');
        }

        $calonMaba = $query->paginate(15);

        return view('admin.calon-maba.status-test', compact('calonMaba', 'statusFilter'));
    }

    /**
     * List User berdasarkan status daftar ulang
     */
    public function daftarUlang()
    {
        $daftarUlangFilter = request('status', 'lengkap');

        $query = CalonMaba::with('user');

        if ($daftarUlangFilter === 'belum') {
            $query->where('status_daftar_ulang', 'belum');
        } else {
            $query->where('status_daftar_ulang', 'lengkap');
        }

        $calonMaba = $query->paginate(15);

        return view('admin.calon-maba.daftar-ulang', compact('calonMaba', 'daftarUlangFilter'));
    }
}
