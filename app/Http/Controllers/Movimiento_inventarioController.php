<?php

namespace App\Http\Controllers;

use App\Models\Movimiento_inventario;
use App\Models\ProductoVariante;
use Illuminate\Http\Request;

class Movimiento_inventarioController extends Controller
{
    public function index()
    {
        $movimientos = Movimiento_inventario::All();
        return view('admin.Movimiento_inventario_index', compact('movimientos'));
    }

    public function store(Request $request)
    {
        $DatosValidados = $request->validate([
            'productos_variantes_id' => 'required|exists:productos_variantes,id',
            'cantidad' => 'required|integer',
            'tipo_movimiento' => 'required|string',
            'fecha_movimiento' => 'required|date',
        ], [
            'productos_variantes_id.required' => 'El ID de la variante del producto es obligatorio.',
            'productos_variantes_id.exists' => 'La variante del producto seleccionada no existe.',
            'cantidad.required' => 'La cantidad es obligatoria.',
            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'tipo_movimiento.required' => 'El tipo de movimiento es obligatorio.',
            'tipo_movimiento.string' => 'El tipo de movimiento debe ser una cadena de texto.',
            'fecha_movimiento.required' => 'La fecha del movimiento es obligatoria.',
            'fecha_movimiento.date' => 'La fecha del movimiento debe ser una fecha válida.',
        ]);

        Movimiento_inventario::create(
            [
                'productos_variantes_id' => $DatosValidados['productos_variantes_id'],
                'cantidad' => $DatosValidados['cantidad'],
                'tipo_movimiento' => $DatosValidados['tipo_movimiento'],
                'fecha_movimiento' => $DatosValidados['fecha_movimiento'],
            ]
        );

        return redirect()->route('movimiento_inventario.index')->with('success', 'Movimiento de inventario creado exitosamente.');
    }
    public function edit($id)
    {
        $movimiento = Movimiento_inventario::findOrFail($id);
        $productosVariantes = ProductoVariante::all();

        return view('admin.Movimiento_inventario_edit', compact('movimiento', 'productosVariantes'));
    }
    public function update(Request $request, $id)
    {
        $DatosValidados = $request->validate([
            'productos_variantes_id' => 'required|exists:productos_variantes,id',
            'cantidad' => 'required|integer',
            'tipo_movimiento' => 'required|string',
            'fecha_movimiento' => 'required|date',
        ], [
            'productos_variantes_id.required' => 'El ID de la variante del producto es obligatorio.',
            'productos_variantes_id.exists' => 'La variante del producto seleccionada no existe.',
            'cantidad.required' => 'La cantidad es obligatoria.',
            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'tipo_movimiento.required' => 'El tipo de movimiento es obligatorio.',
            'tipo_movimiento.string' => 'El tipo de movimiento debe ser una cadena de texto.',
            'fecha_movimiento.required' => 'La fecha del movimiento es obligatoria.',
            'fecha_movimiento.date' => 'La fecha del movimiento debe ser una fecha válida.',
        ]);

        $movimiento = Movimiento_inventario::findOrFail($id);
        $movimiento->update([
            'productos_variantes_id' => $DatosValidados['productos_variantes_id'],
            'cantidad' => $DatosValidados['cantidad'],
            'tipo_movimiento' => $DatosValidados['tipo_movimiento'],
            'fecha_movimiento' => $DatosValidados['fecha_movimiento'],
        ]);

        return redirect()->route('movimiento_inventario.index')->with('success', 'Movimiento de inventario actualizado exitosamente.');
    }
}