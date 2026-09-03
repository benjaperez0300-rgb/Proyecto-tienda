<?php

namespace App\Models;

use App\Models\Marcas;
use App\Models\Categorias;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';
    public $timestamps = false; 
    protected $fillable = [
        'nombre',
        'codigo_barra',
        'precio',
        'material',
        'genero',
        'marcas_id',
        'categorias_id',
    ];
    public function marca()
    {
        return $this->belongsTo(Marcas::class, 'marcas_id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'categorias_id');
    }
}