<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JawabanTest extends Model
{
    protected $fillable = [
        'user_id',
        'soal_test_id',
        'test_session_id',
        'jawaban_user',
        'is_correct',
        'waktu_jawab'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function soalTest()
    {
        return $this->belongsTo(SoalTest::class);
    }

    public function testSession()
    {
        return $this->belongsTo(TestSession::class);
    }
}
