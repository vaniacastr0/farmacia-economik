<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    public $timestamps = false;

    protected $fillable = [ 
        'nombre_producto','precio_producto','stock_producto','id_categoria'
    ];

    public function DetalleProducto():HasMany{
        return $this->hasMany(DetalleProducto::class,'id_producto');
    }

    public function Categoria():BelongsTo{
        return $this->belongsTo(Categoria::class,'id_categoria');
    }

    public function Ventas():BelongsToMany{
        return $this->belongsToMany(Venta::class);
    }

    public function VentasInterseccion():BelongsToMany{
        return $this->belongsToMany(Venta::class)->withPivot(['id_venta','precio','cantidad']);
    }

    public function IngresoProducto():BelongsTo{
        return $this->belongTo(IngresoProducto::class);
    }

    public function Ajuste():HasMany{
        return $this->hasMany(Ajuste::class);
    }
}
