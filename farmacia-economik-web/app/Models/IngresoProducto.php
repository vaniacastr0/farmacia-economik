<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IngresoProducto extends Model
{
    use HasFactory;
    protected $table = 'ingresos_productos';
    protected $primaryKey = ['id_ingreso', 'id_producto'];
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [ 
        'cantidad','rut_bodeguero'
    ];

    public function Bodeguero():BelongsTo{
        return $this->belongsTo(Bodeguero::class);
    }

    public function Producto():HasMany{
        return $this->hasMany(Producto::class);
    }

}
