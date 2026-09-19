<?php

namespace App\Http\Controllers;

use App\Models\Pedidos_productos;
use App\Models\Pedidos;
use App\Models\ProductosVariantes;
use Illuminate\Http\Request;

class Pedidos_productosController extends Controller
{
    public function index()
    {
        $pedidos_productos = Pedidos_productos::with(
            'pedido',
            'variante.producto',
            'variante.talle',
            'variante.color'
        )->get();

        $pedidos = Pedidos::all();

        $productos_variantes = ProductosVariantes::with(
            'producto',
            'talle',
            'color'
        )->get();

        return view(
            'admin.pedidos_productos',
            compact(
                'pedidos_productos',
                'pedidos',
                'productos_variantes'
            )
        );
    }

    public function store(Request $request)
    {
        $Datosvalidados = $request->validate([
            'pedidos_id' => 'required|exists:pedidos,id',
            'producto_variantes_id' => 'required|exists:producto_variantes,id',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
        ], [
            'pedidos_id.required' => 'El pedido es obligatorio.',
            'pedidos_id.exists' => 'El pedido seleccionado no existe.',

            'producto_variantes_id.required' =>
                'La variante del producto es obligatoria.',

            'producto_variantes_id.exists' =>
                'La variante del producto seleccionada no existe.',

            'cantidad.required' => 'La cantidad es obligatoria.',
            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'cantidad.min' => 'La cantidad debe ser al menos 1.',

            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número.',
            'precio.min' => 'El precio no puede ser negativo.',
        ]);

        Pedidos_productos::create([
            'pedidos_id' => $Datosvalidados['pedidos_id'],
            'producto_variantes_id' =>
                $Datosvalidados['producto_variantes_id'],
            'cantidad' => $Datosvalidados['cantidad'],
            'precio' => $Datosvalidados['precio'],
        ]);

        return redirect()
            ->route('pedidos_productos.index')
            ->with(
                'mensaje',
                'Producto agregado al pedido correctamente.'
            );
    }

    public function edit($id)
    {
        $pedido_producto = Pedidos_productos::findOrFail($id);

        $pedidos = Pedidos::all();

        $productos_variantes = ProductosVariantes::with(
            'producto',
            'talle',
            'color'
        )->get();

        return view(
            'pedidos_productos.edit',
            compact(
                'pedido_producto',
                'pedidos',
                'productos_variantes'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $Datosvalidados = $request->validate([
            'pedidos_id' => 'required|exists:pedidos,id',
            'producto_variantes_id' => 'required|exists:producto_variantes,id',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
        ], [
            'pedidos_id.required' => 'El pedido es obligatorio.',
            'pedidos_id.exists' => 'El pedido seleccionado no existe.',

            'producto_variantes_id.required' =>
                'La variante del producto es obligatoria.',

            'producto_variantes_id.exists' =>
                'La variante del producto seleccionada no existe.',

            'cantidad.required' => 'La cantidad es obligatoria.',
            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'cantidad.min' => 'La cantidad debe ser al menos 1.',

            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número.',
            'precio.min' => 'El precio no puede ser negativo.',
        ]);

        $pedido_producto = Pedidos_productos::findOrFail($id);

        $pedido_producto->update($Datosvalidados);

        return redirect()
            ->route('pedidos_productos.index')
            ->with(
                'mensaje',
                'Producto del pedido actualizado correctamente.'
            );
    }
}