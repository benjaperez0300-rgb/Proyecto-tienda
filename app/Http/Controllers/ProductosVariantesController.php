<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Talles;
use App\Models\Colores;
use App\Models\ProductosVariantes;
use Illuminate\Http\Request;

class ProductosVariantesController extends Controller
{
    // MOSTRAR VARIANTES
    public function index()
    {
        $productosVariantes = ProductosVariantes::with(
            'producto',
            'talle',
            'color'
        )->get();

        $productos = Productos::all();
        $talles = Talles::all();
        $colores = Colores::all();

        return view(
            'admin.ProductosVariantes',
            compact(
                'productosVariantes',
                'productos',
                'talles',
                'colores'
            )
        );
    }

    // GUARDAR VARIANTE
    public function store(Request $request)
    {
        $Datosvalidados = $request->validate([
            'productos_id' => 'required|exists:productos,id',
            'talles_id' => 'required|exists:talles,id',
            'colores_id' => 'required|exists:colores,id',
            'stock' => 'required|integer|min:0',
        ], [
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
            ->route('admin.ProductosVariantes')
            ->with(
                'mensaje',
                'Variante de producto guardada correctamente.'
            );
    }

    // MOSTRAR FORMULARIO DE EDICIÓN
    public function edit($id)
    {
        $variante = ProductosVariantes::findOrFail($id);

        $productos = Productos::all();
        $talles = Talles::all();
        $colores = Colores::all();

        return view(
            'admin.edit_productos_variantes',
            compact(
                'variante',
                'productos',
                'talles',
                'colores'
            )
        );
    }

    // ACTUALIZAR VARIANTE
    public function update(Request $request, $id)
    {
        $Datosvalidados = $request->validate([
            'productos_id' => 'required|exists:productos,id',
            'talles_id' => 'required|exists:talles,id',
            'colores_id' => 'required|exists:colores,id',
            'stock' => 'required|integer|min:0',
        ], [
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

        $variante = ProductosVariantes::findOrFail($id);

        $variante->update($Datosvalidados);

        return redirect()
            ->route('admin.ProductosVariantes')
            ->with(
                'mensaje',
                'Variante de producto actualizada correctamente.'
            );
    }
}