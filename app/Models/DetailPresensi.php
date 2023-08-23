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
    ];

    public function presensi()
    {
        return $this->belongsTo(Presensi::class);
    }
}
