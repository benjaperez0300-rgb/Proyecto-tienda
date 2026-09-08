<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    protected $table = 'compras';
    protected $primaryKey = 'id';
    public $timestamps = false; 
    protected $fillable = [
        'compras_id',
        'producto_variante_id',
        'cantidad',
        'precio',
    ];
    public function Compras()
    {
        return $this->belongsTo(Compras::class, 'compras_id');
    }
    public function ProductosVariantes()
    {
        return $this->belongsTo(ProductoVariante::class, 'producto_variante_id');
    }
}