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
        'rut','password','nombre','apellido','tipo_usuario',
    ];


    public function IngresoProducto():HasMany{
        return $this->hasMany(IngresoProductos::class, 'rut');
    }

    public function Ventas(){
        return $this->hasMany(Ventas::class, 'rut');
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
    
}
