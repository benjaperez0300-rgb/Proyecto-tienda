<?php

namespace App\Models;

use App\Models\Pedidos;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'facturas';
    protected $primaryKey = 'id';
    public $timestamps = false; 
    protected $fillable = [
        'pedidos_id',
        'fecha_factura',
        'numero_factura',
        'subtotal',
        'impuestos',
        'total'

    ];

    public function pedido()
    {
        return $this->belongsTo(Pedidos::class, 'pedidos_id');
    }
}