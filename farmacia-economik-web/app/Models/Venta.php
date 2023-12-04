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
    public $timestamps = false;

    protected $fillable = [ 
        'fecha','hora','metodo_pago','total_venta','rut_usuario','rut_cliente'
    ];
    
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // Establecer el valor del campo 'fecha' como la fecha actual al crear una instancia de la clase
        $this->attributes['fecha'] = now();

        // Establecer el valor del campo 'hora' como la hora actual al crear una instancia de la clase
        $this->attributes['hora'] = now()->format('H:i:s'); // Formato de hora (opcional)
    }

    public function Usuarios():BelongsTo{
        return $this->belongsTo(Usuario::class,'rut_usuario');
    } 

    public function Cliente():BelongsTo{
        return $this->belongsTo(Cliente::class,'rut_cliente');
    } 

    public function Productos():BelongsToMany{
        return $this->belongsToMany(Producto::class);
    }

    public function ProductosInterseccion():BelongsToMany{
        return $this->belongsToMany(Producto::class, 'detalle_ventas', 'id_venta', 'id_producto')->withPivot(['id_producto','precio','cantidad','total']);
    }


}