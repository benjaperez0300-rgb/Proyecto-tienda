<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Talles;
use App\Models\Colores;
use App\Models\ProductosVariantes;
use Illuminate\Http\Request;

class ProductosVariantesController extends Controller
{
    public function index()
    {
        $productosVariantes = ProductosVariantes::with('producto', 'talle', 'color')->get();

        return view('admin.productos_variantes', compact('productosVariantes'));
    }

    public function store(Request $request)
    {
        $Datosvalidados=$request->validate([
            'productos_id' => 'required|exists:productos,id_producto',
            'talles_id' => 'required|exists:talles,id_talle',
            'colores_id' => 'required|exists:colores,id_color',
            'stock' => 'required|integer|min:0',
        ],[
            'productos_id.required' => 'El producto es obligatorio.',
            'productos_id.exists' => 'El producto seleccionado no existe.',
            'talles_id.required' => 'El talle es obligatorio.',
            'talles_id.exists' => 'El talle seleccionado no existe.',
            'colores_id.required' => 'El color es obligatorio.',
            'colores_id.exists' => 'El color seleccionado no existe.',
            'stock.required' => 'El stock es obligatorio.',
            'stock.integer' => 'El stock debe ser un número entero.',
            'stock.min' => 'El stock no puede ser negativo.',
        ]);

        ProductosVariantes::create([
            'productos_id' => $Datosvalidados['productos_id'],
            'talles_id' => $Datosvalidados['talles_id'],
            'colores_id' => $Datosvalidados['colores_id'],
            'stock' => $Datosvalidados['stock'],
        ]);

        return redirect()
           ->route ('productos_variantes.index')
           ->with('mensaje', 'Variante de producto guardada correctamente.');
    }
    public function edit($id_producto_variante)
    {
        $variante = ProductosVariantes::findOrFail($id_producto_variante);
        $productos = Productos::all();
        $talles = Talles::all();
        $colores = Colores::all();

        return view('admin.edit_productos_variantes', compact('variante', 'productos', 'talles', 'colores'));
    }
    public function update(Request $request, $id_producto_variante)
    {
        $Datosvalidados=$request->validate([
            'productos_id' => 'required|exists:productos,id_producto',
            'talles_id' => 'required|exists:talles,id_talle',
            'colores_id' => 'required|exists:colores,id_color',
            'stock' => 'required|integer|min:0',
        ],[
            'productos_id.required' => 'El producto es obligatorio.',
            'productos_id.exists' => 'El producto seleccionado no existe.',
            'talles_id.required' => 'El talle es obligatorio.',
            'talles_id.exists' => 'El talle seleccionado no existe.',
            'colores_id.required' => 'El color es obligatorio.',
            'colores_id.exists' => 'El color seleccionado no existe.',
            'stock.required' => 'El stock es obligatorio.',
            'stock.integer' => 'El stock debe ser un número entero.',
            'stock.min' => 'El stock no puede ser negativo.',
        ]);

        $variante = ProductosVariantes::findOrFail($id_producto_variante);
        $variante->update($Datosvalidados);

        return redirect()
           ->route ('productos_variantes.index')
           ->with('mensaje', 'Variante de producto actualizada correctamente.');
    }
}