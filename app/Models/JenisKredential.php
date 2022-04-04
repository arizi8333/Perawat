<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKredential extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_jenis_kredensial';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $table = 'jenis_kredentials';

    public $timestamps = false;

    protected $fillable = [
        'id_jenis_kredensial','nama_jenis'
    ];

    public function request_credentials(){
        return $this->hasMany(RequestKredensial::class);
    }

    public function persyaratans(){
        return $this->hasMany(Persyaratan::class);
    }
}
