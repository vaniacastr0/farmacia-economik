<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vendedor extends Model
{
    use HasFactory;
    protected $table = 'vendedores';
    protected $primaryKey = 'rut';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [ 
        'nombre','apellido','tipo_usuario','rut'
    ];

    public function Usuario():BelongsTo{
        return $this->belongsTo(Usuario::class);
    } 

    public function Venta():HasMany{
        return $this->hasMany(Venta::class);
    }
}
