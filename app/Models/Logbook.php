<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_logbook';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $table = 'logbooks';

    public $timestamps = false;

    protected $fillable = [
        'id_logbook','credential_id','kegiatan'
    ];

    public function request_credentials(){
        return $this->hasMany(RequestKredensial::class);
    }
}
