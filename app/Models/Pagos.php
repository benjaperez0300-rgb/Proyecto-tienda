<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    protected $table = 'pagos';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'pedidos_id',
        'metodos_pagos_id',
        'monto',
        'numero_cuota',
        'fecha_pago',
    ];


    public function pedido()
    {
        return $this->belongsTo(
            Pedidos::class,
            'pedidos_id'
        );
    }


    public function metodoPago()
    {
        return $this->belongsTo(
            MetodosPagos::class,
            'metodos_pagos_id'
        );
    }
}