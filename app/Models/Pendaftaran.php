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
        'kadaluarasa',
        'status_pembayaran',
        'status_sertifikat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function semnas()
    {
        return $this->belongsTo(Semnas::class);
    }
}
