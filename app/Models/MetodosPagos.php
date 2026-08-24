<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetodosPagos extends Model
{
protected $table = 'metodos_pagos';
    protected $primaryKey = 'id_metodo_pago';
    public $timestamps = false; 
    protected $fillable = [
        'nombre',
    ];
}
