<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadosPedidos extends Model
{
    protected $table = 'estados_pedidos';
    protected $primaryKey = 'id';
    public $timestamps = false; 
    protected $fillable = [
        'nombre',
    ];
}
