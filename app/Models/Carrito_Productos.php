<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrito_Productos extends Model
{
    protected $table = 'carrito_productos';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'carritos_id',
        'productos_id',
        'productos_variantes_id',
        'cantidad',
    ];

    // Carrito al que pertenece
    public function carrito()
    {
        return $this->belongsTo(
            Carritos::class,
            'carritos_id'
        );
    }

    // Producto
    public function producto()
    {
        return $this->belongsTo(
            Productos::class,
            'productos_id'
        );
    }

    // Variante elegida
    public function variante()
    {
        return $this->belongsTo(
            ProductosVariantes::class,
            'productos_variantes_id'
        );
    }
}

