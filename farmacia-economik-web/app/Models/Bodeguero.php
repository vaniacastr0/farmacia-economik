<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bodeguero extends Model
{
    use HasFactory;
    protected $table = 'bodegueros';
    protected $primaryKey = 'rut';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [ 
        'nombre','apellido','tipo_usuario'
    ];

    public function Usuario():BelongsTo{
        return $this->belongsTo(Usuario::class);
    } 

    public function IngresoProducto():HasMany{
        return $this->hasMany(IngresoProducto::class);
    }
}
