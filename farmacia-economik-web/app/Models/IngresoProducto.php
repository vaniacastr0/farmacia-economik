<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IngresoProducto extends Model
{
    use HasFactory;
    protected $table = 'ingreso_productos';
    protected $primaryKey = 'id_ingreso';
    public $timestamps = false;

    protected $fillable = [ 
        'cantidad','rut_bodeguero','id_producto'
    ];

    public function Bodeguero():BelongsTo{
        return $this->belongsTo(Bodeguero::class);
    }

    public function Producto():HasMany{
        return $this->hasMany(Producto::class);
    }

}
