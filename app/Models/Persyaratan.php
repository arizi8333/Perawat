<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persyaratan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_persyaratan';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $table = 'persyaratans';

    public $timestamps = false;

    protected $fillable = [
        'id_persyaratan','jenis_kredensial_id','nama_persyaratan'
    ];

    public function detail_persyaratans(){
        return $this->hasMany(DetailPersyaratan::class);
    }

    public function jenis_kredensial(){
        return $this->belongsTo(JenisKredential::class,'jenis_kredensial_id','id_jenis_kredensial');
    }
}
