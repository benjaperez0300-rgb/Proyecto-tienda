<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadosPedidos extends Model
{
    protected $table = 'estados_pedidos';
    protected $primaryKey = 'estados_pedidos';
    public $timestamps = false; 
    protected $fillable = [
        'nombre',
    ];
}
