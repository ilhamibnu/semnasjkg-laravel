<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    use HasFactory;

    protected $table = 'tb_sertifikat';

    protected $fillable = [
        'name',
        'link',
    ];

    public function semnas()
    {
        return $this->belongsTo(Semnas::class);
    }
}
