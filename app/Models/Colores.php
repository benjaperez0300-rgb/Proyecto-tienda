<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colores extends Model
{
protected $table = 'colores';
    protected $primaryKey = 'id_color';
    public $timestamps = false; 
    protected $fillable = [
        'nombre', 'codigo_hex',
    ];
}
