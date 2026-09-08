<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimiento_inventario extends Model
{
    protected $table = 'movimiento_inventario';
    protected $primaryKey = 'id';
    public $timestamps = false; 
    protected $fillable = [
        'productos_variantes_id',
        'cantidad',
        'tipo_movimiento',
        'fecha_movimiento',
    ];
    public function productos_variantes()
    {
        return $this->belongsTo(ProductoVariante::class, 'productos_variantes_id');
    }
}   