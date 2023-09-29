<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuarios';
    protected $primaryKey = 'tipo';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;


    protected $fillable = [ 
        'rut','password'
    ];

    public function Bodeguero():HasMany{
        return $this->hasMany(Bodeguero::class);
    }

    public function Vendedor():HasMany{
        return $this->hasMany(Vendedor::class);
    }
}
