<?php

namespace App\Models;

use App\Models\Productos;
use App\Models\Talles;
use App\Models\Colores;
use Illuminate\Database\Eloquent\Model;

class ProductosVariantes extends Model
{
    protected $table = 'producto_variantes';
    protected $primaryKey = 'id';
    public $timestamps = false; 
    protected $fillable = [
        'productos_id',
        'talles_id',
        'colores_id',
        'stock',

    ];

    public function producto()
    {
        return $this->belongsTo(Productos::class, 'productos_id');
    }

    public function talle()
    {
        return $this->belongsTo(Talles::class, 'talles_id');
    }

    public function color()
    {
        return $this->belongsTo(Colores::class, 'colores_id');
    }
}