<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categoria_producto';
    protected $primaryKey = 'id_categoria';
    public $timestamps = false;

    protected $fillable = [ 
        'nombre'
    ];

    public function Producto():HasMany{
        return $this->hasMany(Producto::class);
    }
}
