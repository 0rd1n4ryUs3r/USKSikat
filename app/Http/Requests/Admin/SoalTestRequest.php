<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SoalTestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

    public function rules(): array
    {
        return [
            'pertanyaan' => ['required', 'string'],
            'pilihan_a' => ['required', 'string', 'max:255'],
            'pilihan_b' => ['required', 'string', 'max:255'],
            'pilihan_c' => ['required', 'string', 'max:255'],
            'pilihan_d' => ['required', 'string', 'max:255'],
            'pilihan_e' => ['nullable', 'string', 'max:255'],
            'jawaban_benar' => ['required', 'in:a,b,c,d,e'],
            'kategori' => ['required', 'in:matematika,bahasa_inggris,logika,umum'],
            'penjelasan' => ['nullable', 'string'],
        ];
    }
}
