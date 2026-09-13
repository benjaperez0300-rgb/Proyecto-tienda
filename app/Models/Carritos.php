<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carritos extends Model
{
    protected $table = 'carritos';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'usuarios_id'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuarios_id');
    }

    public function productos()
    {
        return $this->hasMany(Carrito_Productos::class, 'carritos_id');
    }
}