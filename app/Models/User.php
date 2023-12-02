<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'tb_user';

    protected $fillable = [
        'name',
        'nim',
        'email',
        'password',
        'nama_instansi',
        'code',
        'id_role',
        'id_kampus',
        'id_jenis_peserta',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role', 'id');
    }

    public function kampus()
    {
        return $this->belongsTo(Kampus::class, 'id_kampus', 'id');
    }

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'id_user', 'id');
    }

    public function detailpresensi()
    {
        return $this->hasMany(DetailPresensi::class, 'id_user', 'id');
    }

    public function jenis_peserta()
    {
        return $this->belongsTo(JenisPeserta::class, 'id_jenis_peserta', 'id');
    }
}
