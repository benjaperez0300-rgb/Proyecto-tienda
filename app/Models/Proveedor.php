<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre_empresa',
        'celular',
        'mail',
        'rut',
        'codigo_postal',
        'direccion',
    ];
}
