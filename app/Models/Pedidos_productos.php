<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedidos_productos extends Model
{
    protected $table = 'pedido_productos';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'pedidos_id',
        'producto_variantes_id',
        'cantidad',
        'precio',
    ];


    public function pedido()
    {
        return $this->belongsTo(
            Pedidos::class,
            'pedidos_id'
        );
    }


    public function variante()
    {
        return $this->belongsTo(
            ProductosVariantes::class,
            'producto_variantes_id'
        );
    }
}