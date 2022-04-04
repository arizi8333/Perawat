<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPersyaratan extends Model
{
    use HasFactory;

    protected $primaryKey = 'credential_id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $table = 'detail_persyaratans';

    public $timestamps = false;

    protected $fillable = [
        'credential_id','persyaratan_id','file','status','note'
    ];

    public function persyaratan(){
        return $this->belongsTo(Persyaratan::class,'persyaratan_id','id_persyaratan');
    }

    public function request_credensial(){
        return $this->belongsTo(RequestKredensial::class,'credential_id','id_kredensial');
    }
}
