<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'tb_group';

    protected $fillable = [
        'name',
        'link',
        'id_semnas'
    ];

    public function semnas()
    {
        return $this->belongsTo(Semnas::class, 'id_semnas', 'id');
    }
}
