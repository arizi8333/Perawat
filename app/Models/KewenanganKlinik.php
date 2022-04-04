<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KewenanganKlinik extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_kewenangan';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $table = 'kewenangan_klinis';

    public $timestamps = false;

    protected $fillable = [
        'id_kewenangan','perawat_klinik_id','rincian_kewenangan','jenis_kewenangan'
    ];

    public function detail_kewenangans(){
        return $this->hasMany(DetailKewenangan::class);
    }

    public function perawat_klinis(){
        return $this->belongsTo(PerawatKlinik::class,'perawat_klinik_id','id_perawat_klinik');
    }
}
