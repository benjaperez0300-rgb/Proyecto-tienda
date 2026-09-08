<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedidos_productos extends Model
{
    protected $table = 'pedidos_productos';
    protected $primaryKey = 'id';
    public $timestamps = false; 
    protected $fillable = [
        'pedidos_id',
        'productos_variantes_id',
        'cantidad',
        'precio',
    ];
    public function pedidos()
    {
        return $this->belongsTo(Pedidos::class, 'pedidos_id');
    }
    public function productos_variantes()
    {
        return $this->belongsTo(ProductoVariante::class, 'productos_variantes_id');
    }
}    
