<?php

namespace App\Http\Controllers;

use App\Models\Carritos;

class CarritosController extends Controller
{
    public function index()
    {
        // Verificar que el usuario haya iniciado sesión
        if (!session('usuario_id')) {
            return redirect()->route('login');
        }


        // Buscar el carrito del usuario
        $carrito = Carritos::with([
            'productos.producto',
            'productos.variante.talle',
            'productos.variante.color'
        ])
        ->where(
            'usuarios_id',
            session('usuario_id')
        )
        ->first();


        // Mostrar el carrito
        return view(
            'tienda.carrito',
            compact('carrito')
        );
    }


    public function store()
    {
        // Verificar que el usuario haya iniciado sesión
        if (!session('usuario_id')) {
            return redirect()->route('login');
        }


        // Crear el carrito si no existe
        $carrito = Carritos::firstOrCreate([

            'usuarios_id' =>
                session('usuario_id')

        ]);


        return redirect()
            ->route('tienda.carrito')
            ->with(
                'success',
                'Carrito creado correctamente.'
            );
    }
}