<?php

namespace App\Http\Controllers;

use App\Models\Carritos;

class CarritosController extends Controller
{
    public function index()
    {
        if (!session('usuario_id')) {
            return redirect()->route('login');
        }

        $carrito = Carritos::with('productos.producto')
            ->where('usuarios_id', session('usuario_id'))
            ->first();

        return view('tienda.carrito', compact('carrito'));
    }

    public function store()
    {
        if (!session('usuario_id')) {
            return redirect()->route('login');
        }

        $carrito = Carritos::firstOrCreate([
            'usuarios_id' => session('usuario_id')
        ]);

        return redirect()
            ->route('tienda.carrito')
            ->with('success', 'Carrito creado correctamente.');
    }
}