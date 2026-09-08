<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrito_Productos extends Model
{
    protected $table = 'carrito_productos';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'carrito_id',
        'producto_id',
        'cantidad'
    ];
    public function carrito()
    {
        return $this->belongsTo(Carrito::class, 'carrito_id');
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}