<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ComprasController extends Controller
{
    public function index()
    {
        $compras = Compras::with('proveedor')->get();
        return view('compras.index', compact('compras'));
    }

    public function store(Request $request)
    {
        $DatosValidados = $request->validate([
            'proveedor_id' => 'required|exists:proveedores,id',
            'producto_id' => 'required|exists:productos,id',
            'fecha' => 'required|date',
            'total' => 'required|numeric|min:0',

        ], [
            'proveedor_id.required' => 'El proveedor es obligatorio.',
            'proveedor_id.exists' => 'El proveedor seleccionado no existe.',
            'producto_id.required' => 'El producto es obligatorio.',
            'producto_id.exists' => 'El producto seleccionado no existe.',  
            'fecha.required' => 'La fecha es obligatoria.',
            'fecha.date' => 'La fecha debe ser una fecha válida.',
            'total.required' => 'El total es obligatorio.',
            'total.numeric' => 'El total debe ser un número válido.',
            'total.min' => 'El total debe ser mayor o igual a 0.',
        ]);

        Compras::create([
            'proveedor_id' => $DatosValidados['proveedor_id'],
            'producto_id' => $DatosValidados['producto_id'],
            'fecha' => $DatosValidados['fecha'],
            'total' => $DatosValidados['total'],
        ]);

        return redirect()->route('compras.index')->with('success', 'Compra creada exitosamente.');
    }
    public function edit($id)
    {
        $compra = Compras::findOrFail($id);
        $proveedores = Proveedor::all();

        return view('compras.edit', compact('compra', 'proveedores'));
    }
    public function update(Request $request, $id)
    {
        $DatosValidados = $request->validate([
            'proveedor_id' => 'required|exists:proveedores,id',
            'producto_id' => 'required|exists:productos,id',
            'fecha' => 'required|date',
            'total' => 'required|numeric|min:0',
        ], [
            'proveedor_id.required' => 'El proveedor es obligatorio.',
            'proveedor_id.exists' => 'El proveedor seleccionado no existe.',
            'producto_id.required' => 'El producto es obligatorio.',
            'producto_id.exists' => 'El producto seleccionado no existe.',   
            'fecha.required' => 'La fecha es obligatoria.',
            'fecha.date' => 'La fecha debe ser una fecha válida.',
            'total.required' => 'El total es obligatorio.',
            'total.numeric' => 'El total debe ser un número válido.',
            'total.min' => 'El total debe ser mayor o igual a 0.',
        ]);

        $compra = Compras::findOrFail($id);
        $compra->update($DatosValidados);

        return redirect()->route('compras.index')->with('success', 'Compra actualizada exitosamente.');
    }
}