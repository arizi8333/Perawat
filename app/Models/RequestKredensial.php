<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class RequestKredensial extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_kredensial';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $appends = ['ttd_url'];

    protected $table = 'request_kredensials';

    public $timestamps = false;

    protected $fillable = [
        'id_kredensial','nip','tempat_dinas_id',
        'jenis_kredensial_id','tgl_request_kredensial',
        'tgl_terbit_surat','tgl_habis_berlaku','status','ttd'
    ];

    public function user(){
        return $this->belongsTo(User::class,'nip','nip');
    }

    public function tempat_dinas(){
        return $this->belongsTo(TempatDinas::class,'tempat_dinas_id','id_tempat_dinas');
    }

    public function jenis_kredensial(){
        return $this->belongsTo(JenisKredential::class,'jenis_kredensial_id','id_jenis_kredensial');
    }

    public function detail_kewenangans(){
        return $this->hasMany(DetailKewenangan::class);
    }

    public function detail_persyaratans(){
        return $this->hasMany(DetailPersyaratan::class);
    }

    public function getTtdUrlAttribute()
    {
        return Storage::url(''.$this->ttd);
    }
}
