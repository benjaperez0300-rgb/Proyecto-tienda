<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductosProveedor extends Model
{
    protected $table = 'productos_proveedor';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'productos_id',
        'proveedores_id',
    ];

    public function producto()
    {
        return $this->belongsTo(
            Productos::class,
            'productos_id'
        );
    }

    public function proveedor()
    {
        return $this->belongsTo(
            Proveedor::class,
            'proveedores_id'
        );
    }
}
