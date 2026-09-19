<?php

namespace App\Http\Controllers;

use App\Models\Colores;
use Illuminate\Http\Request;

class ColoresController extends Controller
{
    public function index()
    {
        $colores = Colores::all();

        return view(
            'admin.colores',
            compact('colores')
        );
    }

    public function store(Request $request)
    {
        $Datosvalidados = $request->validate([
            'nombre' => 'required|string|max:100',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser un texto.',
            'nombre.max' => 'El nombre no puede superar los 100 caracteres.',
        ]);

        Colores::create([
            'nombre' => $Datosvalidados['nombre'],
        ]);

        return redirect()
            ->route('colores.index')
            ->with(
                'mensaje',
                'Color guardado correctamente.'
            );
    }
}
