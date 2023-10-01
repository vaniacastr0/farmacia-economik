<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ajuste extends Model
{
    use HasFactory;
    protected $table = 'ajustes';
    protected $primaryKey = 'id_ajuste';
    public $timestamps = false;

    protected $fillable = [ 
        'fecha','cantidad','motivo','id_producto'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // Establecer el valor del campo 'fecha' como la fecha actual al crear una instancia de la clase
        $this->attributes['fecha'] = now();
    }

    public function Producto():BelongsTo{
        return $this->belongsTo(Producto::class,'id_producto');
    } 



}
