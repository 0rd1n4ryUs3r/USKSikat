<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SoalTestRequest;
use App\Models\SoalTest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SoalTestController extends Controller
{
    public function index(): View
    {
        $soalTests = SoalTest::latest()->paginate(15);

        return view('admin.soal-test.index', compact('soalTests'));
    }

    public function create(): View
    {
        return view('admin.soal-test.create');
    }

    public function store(SoalTestRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $validated['gambar'] = $file->storeAs('soal-test', $filename, 'public');
        }

        SoalTest::create($validated);

        return Redirect::route('admin.soal-test.index')->with('success', 'Soal test berhasil dibuat.');
    }

    public function edit(SoalTest $soalTest): View
    {
        return view('admin.soal-test.edit', compact('soalTest'));
    }

    public function update(SoalTestRequest $request, SoalTest $soalTest): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('gambar')) {
            if ($soalTest->gambar && Storage::disk('public')->exists($soalTest->gambar)) {
                Storage::disk('public')->delete($soalTest->gambar);
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $validated['gambar'] = $file->storeAs('soal-test', $filename, 'public');
        }

        $soalTest->update($validated);

        return Redirect::route('admin.soal-test.index')->with('success', 'Soal test berhasil diperbarui.');
    }

    public function destroy(SoalTest $soalTest): RedirectResponse
    {
        if ($soalTest->gambar && Storage::disk('public')->exists($soalTest->gambar)) {
            Storage::disk('public')->delete($soalTest->gambar);
        }

        $soalTest->delete();

        return Redirect::route('admin.soal-test.index')->with('success', 'Soal test berhasil dihapus.');
    }
}
