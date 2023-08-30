<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'tb_pendaftaran';

    protected $fillable = [
        'link_pembayaran',
        'kadaluarsa',
        'status_pembayaran',
        'status_sertifikat',
        'id_user',
        'id_semnas',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function semnas()
    {
        return $this->belongsTo(Semnas::class, 'id_semnas', 'id');
    }
}
