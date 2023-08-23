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
    ];

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class);
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class);
    }

    public function group()
    {
        return $this->hasMany(Group::class);
    }

    public function sertifikat()
    {
        return $this->hasMany(Sertifikat::class);
    }
}
