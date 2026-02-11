<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalonMaba extends Model
{
    protected $table = 'calon_maba';

    protected $fillable = [
        'user_id',
        'nomor_test',
        'nim',
        'status_test',
        'nilai_test',
        'status_daftar_ulang'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
