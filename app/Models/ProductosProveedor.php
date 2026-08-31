<?php

namespace App\Models;

use App\Models\Productos;
use App\Models\Proveedores;
use Illuminate\Database\Eloquent\Model;

class ProductosProveedor extends Model
{
    protected $table = 'productos_proveedor';
    protected $primaryKey = 'id_producto_proveedor';
    public $timestamps = false; 
    protected $fillable = [
        'productos_id',
        'proveedores_id',
    ];

    public function producto()
    {
        return $this->belongsTo(Productos::class, 'productos_id');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedores::class, 'proveedores_id');
    }
}