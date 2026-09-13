<?php

namespace App\Http\Controllers;

use App\Models\Pedidos_productos;
use App\Models\Pedidos;
use App\Models\ProductoVariante;
use Illuminate\Http\Request;

class Pedidos_productosController extends Controller
{
    public function index()
    {
        $pedidos_productos = Pedidos_productos::all();
        return view('pedidos_productos.index', compact('pedidos_productos'));
    }

    public function store(Request $request)
    {
        $Datosvalidados = $request->validate([
            'pedidos_id' => 'required|exists:pedidos,id',
            'productos_variantes_id' => 'required|exists:productos_variantes,id',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
        ], [
            'pedidos_id.required' => 'El ID del pedido es obligatorio.',
            'pedidos_id.exists' => 'El ID del pedido no existe en la base de datos.',
            'productos_variantes_id.required' => 'El ID de la variante del producto es obligatorio.',
            'productos_variantes_id.exists' => 'El ID de la variante del producto no existe en la base de datos.',
            'cantidad.required' => 'La cantidad es obligatoria.',
            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'cantidad.min' => 'La cantidad debe ser al menos 1.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número.',
            'precio.min' => 'El precio no puede ser negativo.',
        ]);

        Pedidos_productos::create(
            [
                'pedidos_id' => $Datosvalidados['pedidos_id'],
                'productos_variantes_id' => $Datosvalidados['productos_variantes_id'],
                'cantidad' => $Datosvalidados['cantidad'],
                'precio' => $Datosvalidados['precio'],
            ]
        );

        return redirect('/pedidos-productos');
    }
    public function edit($id)
    {
        $pedido_producto = Pedidos_productos::findOrFail($id);
        $pedidos = Pedidos::all();
        $productosVariantes = ProductoVariante::all();

        return view('pedidos_productos.edit', compact('pedido_producto', 'pedidos', 'productosVariantes'));
    }
    public function update(Request $request, $id)
    {
        $Datosvalidados = $request->validate([
            'pedidos_id' => 'required|exists:pedidos,id',
            'productos_variantes_id' => 'required|exists:productos_variantes,id',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
        ], [
            'pedidos_id.required' => 'El ID del pedido es obligatorio.',
            'pedidos_id.exists' => 'El ID del pedido no existe en la base de datos.',
            'productos_variantes_id.required' => 'El ID de la variante del producto es obligatorio.',
            'productos_variantes_id.exists' => 'El ID de la variante del producto no existe en la base de datos.',
            'cantidad.required' => 'La cantidad es obligatoria.',
            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'cantidad.min' => 'La cantidad debe ser al menos 1.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número.',
            'precio.min' => 'El precio no puede ser negativo.',
        ]);

        $pedido_producto = Pedidos_productos::findOrFail($id);
        $pedido_producto->update($Datosvalidados);

        return redirect('/pedidos-productos');
    }
}