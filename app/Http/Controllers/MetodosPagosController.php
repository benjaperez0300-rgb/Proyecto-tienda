<?php

namespace App\Http\Controllers;

use App\Models\MetodosPagos;
use Illuminate\Http\Request;

class MetodosPagosController extends Controller
{
public function index()
    {
        $metodosPagos = MetodosPagos::all();

        return view('metodos_pagos.index', compact('metodosPagos'));
    }

    public function store(Request $request)
    {
        $Datosvalidados=$request->validate([
            'nombre' => 'required|string|max:100',
        ],[
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede superar los 100 caracteres.',
        ]);

        MetodosPagos::create([
            'nombre' => $Datosvalidados['nombre'],
        ]);

        return redirect('/metodos-pagos');
    }
}
