<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerawatKlinik extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id_perawat_klinik';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $table = 'perawat_kliniks';

    public $timestamps = false;

    protected $fillable = [
        'id_perawat_klinik','jabatan'
    ];

    public function kewenangan_klinis(){
        return $this->hasMany(KewenanganKlinik::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
