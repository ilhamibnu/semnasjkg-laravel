<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPeserta extends Model
{
    use HasFactory;

    protected $table = 'tb_jenis_peserta';

    protected $fillable = [
        'name',
    ];

    public function kampus()
    {
        return $this->hasMany(Kampus::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function semnas()
    {
        return $this->hasMany(Semnas::class);
    }
}
