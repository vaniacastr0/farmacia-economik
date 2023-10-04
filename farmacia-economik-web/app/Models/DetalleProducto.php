<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetalleProducto extends Model
{
    use HasFactory;
    protected $table = 'detalle_producto';
    protected $primaryKey = 'id_detalle_producto';
    public $timestamps = false;

    protected $fillable = [ 
        'fecha_elab','fecha_venc','stock','id_producto'
    ];


    public function Producto():BelongsTo{
        return $this->belongsTo(Producto::class);
    } 
}
