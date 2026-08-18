<?php

namespace App\Http\Controllers;

use App\Models\EstadosPedidos;
use Illuminate\Http\Request;

class EstadosPedidosController extends Controller
{
     public function index()
    {
        $estados = EstadosPedidos::all();

        return view('estados_pedidos', compact('estados'));
    }
      public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
        ]);

        EstadosPedidos::create([
            'nombre' => $request->nombre,
        ]);

        return redirect('/estados-pedidos');
    }
}
