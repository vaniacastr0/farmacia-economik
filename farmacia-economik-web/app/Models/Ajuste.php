<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ajuste extends Model
{
    use HasFactory;
    protected $table = 'ajustes';
    protected $primaryKey = ['id_producto','fecha'];
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [ 
        'cantidad','motivo'
    ];

    public function Producto():BelongsTo{
        return $this->belongsTo(Prodcuto::class);
    } 



}
