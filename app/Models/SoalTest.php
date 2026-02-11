<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoalTest extends Model
{
    protected $fillable = [
        'pertanyaan',
        'pilihan_a',
        'pilihan_b',
        'pilihan_c',
        'pilihan_d',
        'pilihan_e',
        'jawaban_benar',
        'kategori',
        'tingkat_kesulitan',
        'gambar',
        'penjelasan'
    ];

    public function jawabanTests()
    {
        return $this->hasMany(JawabanTest::class);
    }
}
