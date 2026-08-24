<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Talles extends Model
{
protected $table = 'talles';
    protected $primaryKey = 'id_talle';
    public $timestamps = false; 
    protected $fillable = [
        'nombre',
    ];
}
