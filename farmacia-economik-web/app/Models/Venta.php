<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Venta extends Model
{
    use HasFactory;
    protected $table = 'ventas';
    protected $primaryKey = 'id_venta';
    public $timestamps = true;

    protected $fillable = [ 
        'metodo_pago','rut_vendedor','rut_cliente'
    ];
    
    public function Vendedor():BelongsTo{
        return $this->belongsTo(Vendedor::class);
    } 

    public function Cliente():BelongsTo{
        return $this->belongsTo(Cliente::class);
    } 

    public function Productos():BelongsToMany{
        return $this->belongsToMany(Producto::class);
    }

    public function ProductosInterseccion():BelongsToMany{
        return $this->belongsToMany(Producto::class)->withPivot(['id_producto','precio','cantidad']);
    }


}
