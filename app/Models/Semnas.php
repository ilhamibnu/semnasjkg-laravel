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
}
