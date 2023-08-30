<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $table = 'tb_presensi';

    protected $fillable = [
        'name',
        'waktu_mulai',
        'waktu_selesai',
        'id_semnas',
    ];

    public function semnas()
    {
        return $this->belongsTo(Semnas::class, 'id_semnas', 'id');
    }

    public function detail_presensi()
    {
        return $this->hasMany(DetailPresensi::class, 'id_presensi', 'id');
    }
}
