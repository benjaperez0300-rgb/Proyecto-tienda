<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleCompras extends Model
{
    protected $table = 'detalle_compras';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'compras_id',
        'producto_variante_id',
        'cantidad',
        'precio',
    ];

    public function compra()
    {
        return $this->belongsTo(Compras::class, 'compras_id');
    }

    public function productoVariante()
    {
        return $this->belongsTo(
            ProductosVariantes::class,
            'producto_variante_id'
        );
    }
}