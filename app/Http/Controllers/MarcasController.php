<?php

namespace App\Http\Controllers;

use App\Models\Marcas;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
public function index()
    {
        $marcas = Marcas::all();

        return view('marcas.index', compact('marcas'));
    }

    public function store(Request $request)
    {
        $Datosvalidados=$request->validate([
            'nombre' => 'required|string|max:100',
        ],[
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede superar los 100 caracteres.',
        ]);

        Marcas::create([
            'nombre' => $Datosvalidados['nombre'],
        ]);

        return redirect('/marcas');
    }
}
