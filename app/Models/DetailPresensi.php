<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPresensi extends Model
{
    use HasFactory;

    protected $table = 'tb_detail_presensi';

    protected $fillable = [
        'status',
        'id_user',
        'id_presensi',
    ];

    public function presensi()
    {
        return $this->belongsTo(Presensi::class, 'id_presensi', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
