<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


// use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuario extends Authenticatable
{
    use HasFactory;
    protected $table = 'usuarios';
    protected $primaryKey = 'rut';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;


    protected $fillable = [ 
        'tipo_usuario','password','rut'
    ];

    public function Bodeguero():HasMany{
        return $this->hasMany(Bodeguero::class, 'rut');
    }

    public function Vendedor():HasMany{
        return $this->hasMany(Vendedor::class, 'rut');
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
    
}
