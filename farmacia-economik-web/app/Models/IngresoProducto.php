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
        'fecha','cantidad','rut_usuario','id_producto'
    ];
    
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // Establecer el valor del campo 'fecha' como la fecha actual al crear una instancia de la clase
        $this->attributes['fecha'] = now();
    }

    public function Usuario(): BelongsTo {
        return $this->BelongsTo(Usuario::class, 'rut_usuario');
    }

    public function Producto():BelongsTo {
        return $this->BelongsTo (Producto::class,'id_producto');
    }

}