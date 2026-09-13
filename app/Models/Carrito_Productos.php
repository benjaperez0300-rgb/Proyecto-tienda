<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrito_Productos extends Model
{
    protected $table = 'carrito_productos';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'carritos_id',
        'productos_id',
        'cantidad'
    ];

    public function carrito()
    {
        return $this->belongsTo(Carritos::class, 'carritos_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'productos_id');
    }
}