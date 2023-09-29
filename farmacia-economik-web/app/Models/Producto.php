<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    public $timestamps = false;

    protected $fillable = [ 
        'nombre_producto','stock_producto','id_categoria'
    ];

    public function Categoria():BelongsTo{
        return $this->belongsTo(Categoria::class);
    }

    public function Ventas():BelongsToMany{
        return $this->belongsToMany(Venta::class);
    }

    public function VentasInterseccion():BelongsToMany{
        return $this->belongsToMany(Venta::class)->withPivot(['id_venta','precio','cantidad']);
    }

}
