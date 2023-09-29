<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetalleProducto extends Model
{
    use HasFactory;
    protected $table = 'detalle_producto';
    protected $primaryKey = 'id_producto';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [ 
        'fecha_elab','fecha_venc','stock','precio'
    ];


    public function Producto():BelongsTo{
        return $this->belongsTo(Producto::class);
    } 

}
