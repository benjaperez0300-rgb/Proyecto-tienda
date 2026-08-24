<?php

namespace App\Http\Controllers;

use App\Models\Talles;
use Illuminate\Http\Request;

class TallesController extends Controller
{
public function index()
    {
        $talles = Talles::all();

        return view('talles.index', compact('talles'));
    }

    public function store(Request $request)
    {
        $Datosvalidados=$request->validate([
            'nombre' => 'required|string|max:100',
        ],[
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede superar los 100 caracteres.',
        ]);

        Talles::create([
            'nombre' => $Datosvalidados['nombre'],
        ]);

        return redirect('/talles');
    }
}
