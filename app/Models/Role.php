<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $table = 'roles';

    public $timestamps = false;

    protected $fillable = [
        'id','nama_role'
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
}
