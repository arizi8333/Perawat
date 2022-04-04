<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKewenangan extends Model
{
    use HasFactory;

    protected $primaryKey = 'credential_id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $table = 'detail_kewenangans';

    public $timestamps = false;

    protected $fillable = [
        'credential_id','kewenangan_id','keterangan'
    ];

    public function kewenangan_klinis(){
        return $this->belongsTo(KewenanganKlinik::class,'kewenangan_id','id_kewenangan');
    }

    public function request_credentials(){
        return $this->belongsTo(RequestKredensial::class,'credential_id','id_kredensial');
    }
}
