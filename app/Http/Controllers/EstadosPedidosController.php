<?php

namespace App\Http\Controllers;

use App\Models\EstadosPedidos;
use Illuminate\Http\Request;

class EstadosPedidosController extends Controller
{
    public function index()
    {
        $estados = EstadosPedidos::all();

        return view(
            'admin.estados_pedidos',
            compact('estados')
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

        EstadosPedidos::create([
            'nombre' => $Datosvalidados['nombre'],
        ]);

        return redirect()
            ->route('estados_pedidos.index')
            ->with(
                'mensaje',
                'Estado de pedido guardado correctamente.'
            );
    }
}

