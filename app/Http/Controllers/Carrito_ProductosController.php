<?php

namespace App\Http\Controllers;

use App\Models\Carrito_Productos;
use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Http\Request;

class Carrito_ProductosController extends Controller
{
    public function index()
    {
        $carrito_productos = Carrito_Productos::all();
        return view('admin.Carrito_Productos_edit', compact('carrito_productos'));
    }

    public function store(Request $request)
    {
        $DatosValidados = $request->validate([
            'carrito_id' => 'required|exists:carrito,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ], [
            'carrito_id.required' => 'El ID del carrito es obligatorio.',
            'carrito_id.exists' => 'El carrito seleccionado no existe.',
            'producto_id.required' => 'El ID del producto es obligatorio.',
            'producto_id.exists' => 'El producto seleccionado no existe.',
            'cantidad.required' => 'La cantidad es obligatoria.',
            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'cantidad.min' => 'La cantidad debe ser mayor o igual a 1.',
        ]);

        Carrito_Productos::create([
            'carrito_id' => $DatosValidados['carrito_id'],
            'producto_id' => $DatosValidados['producto_id'],
            'cantidad' => $DatosValidados['cantidad'],
        ]);

        return redirect()->route('carrito_productos.index')->with('success', 'Producto agregado al carrito exitosamente.');
    }
    public function edit($id)
    {
        $carrito_producto = Carrito_Productos::findOrFail($id);
        $carritos = Carrito::all();
        $productos = Producto::all();

        return view('admin.Carrito_Productos_edit', compact('carrito_producto', 'carritos', 'productos'));
    }
    public function update(Request $request, $id)
    {
        $DatosValidados = $request->validate([
            'carrito_id' => 'required|exists:carrito,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ], [
            'carrito_id.required' => 'El ID del carrito es obligatorio.',
            'carrito_id.exists' => 'El carrito seleccionado no existe.',
            'producto_id.required' => 'El ID del producto es obligatorio.',
            'producto_id.exists' => 'El producto seleccionado no existe.',
            'cantidad.required' => 'La cantidad es obligatoria.',
            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'cantidad.min' => 'La cantidad debe ser mayor o igual a 1.',
        ]);

        $carrito_producto = Carrito_Productos::findOrFail($id);
        $carrito_producto->update([
            'carrito_id' => $DatosValidados['carrito_id'],
            'producto_id' => $DatosValidados['producto_id'],
            'cantidad' => $DatosValidados['cantidad'],
        ]);

        return redirect()->route('carrito_productos.index')->with('success', 'Producto en el carrito actualizado exitosamente.');
    }
}