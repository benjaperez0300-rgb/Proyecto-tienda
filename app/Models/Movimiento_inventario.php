<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimiento_inventario extends Model
{
    protected $table = 'movimiento_inventario';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'productos_variantes_id',
        'cantidad',
        'tipo_movimiento',
        'fecha_movimiento',
    ];

    public function productoVariante()
    {
        return $this->belongsTo(
            ProductosVariantes::class,
            'productos_variantes_id'
        );
    }
}
