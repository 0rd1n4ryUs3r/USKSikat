<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CalonMaba;
use App\Models\JawabanTest;
use App\Models\SoalTest;
use App\Models\TestSession;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TestController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Cek apakah user sudah punya calon maba record
        $calonMaba = CalonMaba::firstOrCreate(
            ['user_id' => $user->id],
            ['nomor_test' => 'TEST-'.date('Y').'-'.str_pad($user->id, 5, '0', STR_PAD_LEFT)]
        );

        // Cek apakah sudah pernah test
        $testSession = TestSession::where('user_id', $user->id)
            ->where('status', 'completed')
            ->first();

        if ($testSession) {
            return redirect()->route('user.test.hasil');
        }

        return view('user.test.index', compact('calonMaba'));
    }

    public function mulaiTest(Request $request)
    {
        $user = Auth::user();

        // Cek apakah ada test yang masih ongoing
        $ongoingSession = TestSession::where('user_id', $user->id)
            ->where('status', 'ongoing')
            ->first();

        if ($ongoingSession) {
            return redirect()->route('user.test.ongoing', ['token' => $ongoingSession->token]);
        }

        // Generate token unik
        $token = Str::random(32);

        // Buat test session baru
        $testSession = TestSession::create([
            'user_id' => $user->id,
            'token' => $token,
            'mulai' => now(),
            'status' => 'ongoing',
            'durasi' => 1800, // 30 menit
            'jumlah_soal' => 20,
        ]);

        return redirect()->route('user.test.ongoing', ['token' => $token]);
    }

    public function ongoing($token)
    {
        $testSession = TestSession::where('token', $token)
            ->where('user_id', Auth::id())
            ->where('status', 'ongoing')
            ->firstOrFail();

        // Hitung sisa waktu
        $waktuMulai = Carbon::parse($testSession->mulai);
        $waktuSelesai = $waktuMulai->copy()->addSeconds($testSession->durasi);
        $sisaWaktu = now()->diffInSeconds($waktuSelesai, false);

        // Jika waktu habis
        if ($sisaWaktu <= 0) {
            return $this->selesaikanTest($testSession);
        }

        // Ambil soal yang belum dijawab
        $soalDijawab = JawabanTest::where('test_session_id', $testSession->id)
            ->pluck('soal_test_id')
            ->toArray();

        $soal = SoalTest::whereNotIn('id', $soalDijawab)
            ->inRandomOrder()
            ->first();

        // Jika tidak ada soal lagi, selesaikan test
        if (! $soal) {
            return $this->selesaikanTest($testSession);
        }

        // Ambil semua soal untuk progress
        $totalSoal = $testSession->jumlah_soal;
        $soalTerjawab = count($soalDijawab);

        return view('user.test.ongoing', compact(
            'testSession', 'soal', 'sisaWaktu', 'soalTerjawab', 'totalSoal'
        ));
    }

    public function submitJawaban(Request $request, $token)
    {
        $request->validate([
            'soal_id' => 'required|exists:soal_tests,id',
            'jawaban' => 'required|in:a,b,c,d,e',
        ]);

        $testSession = TestSession::where('token', $token)
            ->where('user_id', Auth::id())
            ->where('status', 'ongoing')
            ->firstOrFail();

        $soal = SoalTest::findOrFail($request->soal_id);

        // Simpan jawaban
        JawabanTest::create([
            'user_id' => Auth::id(),
            'soal_test_id' => $soal->id,
            'test_session_id' => $testSession->id,
            'jawaban_user' => $request->jawaban,
            'is_correct' => $soal->jawaban_benar === $request->jawaban,
            'waktu_jawab' => $request->waktu_jawab ?? null,
        ]);

        return response()->json([
            'success' => true,
            'next_url' => route('user.test.ongoing', ['token' => $token]),
        ]);
    }

    public function timeout(Request $request, $token)
    {
        $testSession = TestSession::where('token', $token)
            ->where('user_id', Auth::id())
            ->where('status', 'ongoing')
            ->firstOrFail();

        return $this->selesaikanTest($testSession);
    }

    private function selesaikanTest($testSession)
    {
        // Hitung nilai
        $jawabanBenar = JawabanTest::where('test_session_id', $testSession->id)
            ->where('is_correct', true)
            ->count();

        $nilai = ($jawabanBenar / $testSession->jumlah_soal) * 100;

        // Update test session
        $testSession->update([
            'selesai' => now(),
            'status' => 'completed',
            'nilai' => $nilai,
            'hasil' => $nilai >= 70 ? 'lulus' : 'tidak_lulus',
        ]);

        // Update calon maba
        $calonMaba = CalonMaba::where('user_id', $testSession->user_id)->first();
        if ($calonMaba) {
            $calonMaba->update([
                'status_test' => $nilai >= 70 ? 'lulus' : 'tidak_lulus',
                'nilai_test' => $nilai,
            ]);
        }

        return redirect()->route('user.test.hasil');
    }

    public function hasil()
    {
        $user = Auth::user();

        $testSession = TestSession::where('user_id', $user->id)
            ->where('status', 'completed')
            ->latest()
            ->first();

        if (! $testSession) {
            return redirect()->route('user.test.index');
        }

        $jawaban = JawabanTest::with('soalTest')
            ->where('test_session_id', $testSession->id)
            ->get();

        $calonMaba = CalonMaba::where('user_id', $testSession->user_id)->first();

        return view('user.test.hasil', compact('testSession', 'jawaban', 'calonMaba'));
    }
}
