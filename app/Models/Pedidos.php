<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    protected $table = 'pedidos';
    protected $primaryKey = 'id';
    public $timestamps = false; 
    protected $fillable = [
        'usuarios_id',
        'productos_id',
        'estados_pedidos_id',
        'fecha_pedido',
        'fecha_envio',
        'subtotal',
        'total',
    ];
    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'usuarios_id');
    }
    public function producto()
    {
        return $this->belongsTo(Productos::class, 'productos_id');
    }
    public function estadosPedido()
    {
        return $this->belongsTo(EstadosPedidos::class, 'estados_pedidos_id');
    }
}