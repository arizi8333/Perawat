<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'nip';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $guard = 'user';
    
    protected $rememberTokenName = false;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nip','role_id','perawat_klinik_id',
        'nama','tempat_lahir','tanggal_lahir','golongan',
        'pangkat','mulai_dinas','pendidikan','email','email_verified_at','password'
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
    ];

    public function role(){
        return $this->belongsTo(Role::class,'role_id','id');
    }

    public function perawat_klinik(){
        return $this->belongsTo(PerawatKlinik::class,'perawat_klinik_id','id_perawat_klinik');
    }

    public function request_credentials(){
        return $this->hasMany(RequestKredensial::class);
    }
}
