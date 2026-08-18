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
        $request->validate([
            'nombre' => 'required|string|max:100',
            'codigo_hex' => 'required|string|max:7|regex:/^#[0-9A-Fa-f]{6}$/',
        ]);

        Colores::create([
            'nombre' => $request->nombre,
            'codigo_hex' => $request->codigo_hex,
        ]);

        return redirect('/colores');
    }
}
