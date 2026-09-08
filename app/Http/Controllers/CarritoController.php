<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use App\Models\Usuario;
use App\Models\Proveedor;

class CarritoController extends Controller
{
    public function index()
    {
        $compras = Compras::all();
        return view('admin.Compras', compact('compras'));
    }

   public function store(Request $request)
    {
        $DatosValidados = $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
        ], [
            'usuario_id.required' => 'El usuario es obligatorio.',
            'usuario_id.exists' => 'El usuario seleccionado no existe.',
        ]);

        Carrito::create([
            'usuario_id' => $DatosValidados['usuario_id'],
        ]);

        return redirect()->route('carrito.index')->with('success', 'Carrito creado exitosamente.');
    }
}