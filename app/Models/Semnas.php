<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semnas extends Model
{
    use HasFactory;

    protected $table = 'tb_semnas';

    protected $fillable = [
        'name',
        'deskripsi',
        'harga',
        'id_jenis_peserta',
    ];

    public function kampus()
    {
        return $this->belongsTo(Kampus::class, 'id_kampus', 'id');
    }

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'id_semnas', 'id');
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'id_semnas', 'id');
    }

    public function group()
    {
        return $this->hasMany(Group::class, 'id_semnas', 'id');
    }

    public function jenis_peserta()
    {
        return $this->belongsTo(JenisPeserta::class, 'id_jenis_peserta', 'id');
    }

    public function lomba()
    {
        return $this->hasMany(Lomba::class, 'id_semnas', 'id');
    }
}
