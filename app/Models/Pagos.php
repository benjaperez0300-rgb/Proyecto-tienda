<?php

namespace App\Models;

use App\Models\Pedidos;
use App\Models\MetodosPagos;
use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    protected $table = 'pagos';
    protected $primaryKey = 'id';
    public $timestamps = false; 
    protected $fillable = [
        'pedidos_id',
        'metodos_pagos_id',
        'fecha_pago',
        'monto',
        'numero_cuota'

    ];

    public function pedido()
    {
        return $this->belongsTo(Pedidos::class, 'pedidos_id');
    }

    public function metodoPago()
    {
        return $this->belongsTo(MetodosPagos::class, 'metodos_pagos_id');
    }
}