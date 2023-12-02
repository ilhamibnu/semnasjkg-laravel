<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    use HasFactory;

    protected $table = 'tb_lomba';

    protected $fillable = [
        'name',
        'link_sertifikat',
        'id_semnas',
        'status',
        'status_pengumpulan',
        'status_pengumpulan_ktm'
    ];

    public function semnas()
    {
        return $this->belongsTo(Semnas::class, 'id_semnas', 'id');
    }

    public function detailLomba()
    {
        return $this->hasMany(DetailLomba::class, 'id_lomba', 'id');
    }
}
