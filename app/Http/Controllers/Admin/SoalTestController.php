<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SoalTestRequest;
use App\Models\SoalTest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
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

        $soalTest->update($validated);

        return Redirect::route('admin.soal-test.index')->with('success', 'Soal test berhasil diperbarui.');
    }

    public function destroy(SoalTest $soalTest): RedirectResponse
    {
        $soalTest->delete();

        return Redirect::route('admin.soal-test.index')->with('success', 'Soal test berhasil dihapus.');
    }
}
