<?php

namespace App\Models;

use App\Models\Proveedor;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    protected $table = 'compras';
    protected $primaryKey = 'id';
    public $timestamps = false; 
    protected $fillable = [
        'proveedor_id',
        'producto_id',
        'fecha',
        'total',
    ];
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }
    public function producto()
    {
        return $this->belongsTo(Productos::class, 'producto_id');
    }
}