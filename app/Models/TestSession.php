<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestSession extends Model
{
    protected $fillable = [
        'user_id',
        'token',
        'mulai',
        'selesai',
        'durasi',
        'status',
        'jumlah_soal',
        'nilai',
        'hasil'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jawabanTests()
    {
        return $this->hasMany(JawabanTest::class);
    }
}
