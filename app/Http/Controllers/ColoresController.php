<?php

namespace App\Http\Controllers;

use App\Models\Colores;
use Illuminate\Http\Request;

class ColoresController extends Controller
{
    public function index()
    {
       $colores = Colores::all();

        return view('colores.index', compact('colores'));
    }

    public function store(Request $request)
    {
        $Datosvalidados=$request->validate([
            'nombre' => 'required|string|max:100',
            'codigo_hex' => 'required|string|max:7|regex:/^#[0-9A-Fa-f]{6}$/',
        ],[
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede superar los 100 caracteres.',
            'codigo_hex.required' => 'El código hexadecimal es obligatorio.',
            'codigo_hex.max' => 'El código hexadecimal no puede superar los 7 caracteres.',
            'codigo_hex.regex' => 'El código hexadecimal debe tener el formato #RRGGBB.',
        ]);

        Colores::create([
            'nombre' => $Datosvalidados['nombre'],
            'codigo_hex' => $Datosvalidados['codigo_hex'],
        ]);

        return redirect('/colores');
    }
}
