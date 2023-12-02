<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailLomba extends Model
{
    use HasFactory;

    protected $table = 'tb_detail_lomba';

    protected $fillable = [
        'link_pengumpulan',
        'link_pengumpulan_ktm',
        'status_unduh',
        'id_lomba',
        'id_user',
    ];

    public function lomba()
    {
        return $this->belongsTo(Lomba::class, 'id_lomba', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
