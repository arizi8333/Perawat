<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatDinas extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tempat_dinas';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $table = 'tempat_dinas';

    public $timestamps = false;

    protected $fillable = [
        'id_tempat_dinas','lokasi'
    ];

    public function request_credentials(){
        return $this->hasMany(RequestKredensial::class);
    }
}
