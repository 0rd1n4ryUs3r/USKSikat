<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CalonMaba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaftarUlangController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $calon = CalonMaba::firstOrCreate(['user_id' => $user->id]);

        return view('user.daftar_ulang.form', compact('calon'));
    }

    public function submit(Request $request)
    {
        $user = Auth::user();
        $calon = CalonMaba::firstOrCreate(['user_id' => $user->id]);

        // Minimal validation for now
        $request->validate([
            'agree' => 'required|accepted',
        ]);

        // Mark daftar ulang lengkap and generate NIM if not exists
        $calon->status_daftar_ulang = 'lengkap';
        if (empty($calon->nim)) {
            $year = date('Y');
            $number = str_pad($calon->id ?: $user->id, 5, '0', STR_PAD_LEFT);
            $calon->nim = $year.$number;
        }
        $calon->save();

        return redirect()->route('user.ambil-nim')->with('success', 'Daftar ulang berhasil, NIM dibuat.');
    }

    public function ambilNim()
    {
        $user = Auth::user();
        $calon = CalonMaba::where('user_id', $user->id)->first();

        if (! $calon || ! $calon->nim) {
            return redirect()->route('user.daftar-ulang')->with('error', 'Silakan lengkapi daftar ulang terlebih dahulu.');
        }

        return view('user.daftar_ulang.ambil_nim', compact('calon'));
    }
}
