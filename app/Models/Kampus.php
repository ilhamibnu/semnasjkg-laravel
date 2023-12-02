<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kampus extends Model
{
    use HasFactory;

    protected $table = 'tb_kampus';

    protected $fillable = [
        'name',
        'id_jenis_peserta',
    ];

    public function semnas()
    {
        return $this->hasMany(Semnas::class, 'id_kampus', 'id');
    }

    public function jenis_peserta()
    {
        return $this->belongsTo(JenisPeserta::class, 'id_jenis_peserta', 'id');
    }
}
