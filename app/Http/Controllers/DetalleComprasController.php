<?php

namespace App\Http\Controllers;

use App\Models\DetalleCompras;
use App\Models\Compras;
use App\Models\ProductosVariantes;
use Illuminate\Http\Request;

class DetalleComprasController extends Controller
{
    public function index()
    {
        $detalleCompras = DetalleCompras::with(
            'compra',
            'productoVariante'
        )->get();

        $compras = Compras::all();

        $productosVariantes = ProductosVariantes::with(
            'producto',
            'talle',
            'color'
        )->get();

        return view(
            'admin.DetalleCompras',
            compact(
                'detalleCompras',
                'compras',
                'productosVariantes'
            )
        );
    }

    public function store(Request $request)
    {
        $DatosValidados = $request->validate([
            'compras_id' => 'required|exists:compras,id',
            'producto_variante_id' => 'required|exists:producto_variantes,id',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
        ], [
            'compras_id.required' => 'La compra es obligatoria.',
            'compras_id.exists' => 'La compra seleccionada no existe.',

            'producto_variante_id.required' => 'La variante del producto es obligatoria.',
            'producto_variante_id.exists' => 'La variante del producto seleccionada no existe.',

            'cantidad.required' => 'La cantidad es obligatoria.',
            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'cantidad.min' => 'La cantidad debe ser mayor o igual a 1.',

            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número válido.',
            'precio.min' => 'El precio debe ser mayor o igual a 0.',
        ]);

        DetalleCompras::create([
            'compras_id' => $DatosValidados['compras_id'],
            'producto_variante_id' => $DatosValidados['producto_variante_id'],
            'cantidad' => $DatosValidados['cantidad'],
            'precio' => $DatosValidados['precio'],
        ]);

        return redirect()
            ->route('detalle_compras.index')
            ->with('mensaje', 'Detalle de compra creado exitosamente.');
    }

    public function edit($id)
    {
        $detalleCompra = DetalleCompras::findOrFail($id);

        $compras = Compras::all();

        $productosVariantes = ProductosVariantes::with(
            'producto',
            'talle',
            'color'
        )->get();

        return view(
            'admin.DetalleCompras_edit',
            compact(
                'detalleCompra',
                'compras',
                'productosVariantes'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $DatosValidados = $request->validate([
            'compras_id' => 'required|exists:compras,id',
            'producto_variante_id' => 'required|exists:producto_variantes,id',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
        ], [
            'compras_id.required' => 'La compra es obligatoria.',
            'compras_id.exists' => 'La compra seleccionada no existe.',

            'producto_variante_id.required' => 'La variante del producto es obligatoria.',
            'producto_variante_id.exists' => 'La variante del producto seleccionada no existe.',

            'cantidad.required' => 'La cantidad es obligatoria.',
            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'cantidad.min' => 'La cantidad debe ser mayor o igual a 1.',

            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número válido.',
            'precio.min' => 'El precio debe ser mayor o igual a 0.',
        ]);

        $detalleCompra = DetalleCompras::findOrFail($id);

        $detalleCompra->update($DatosValidados);

        return redirect()
            ->route('detalle_compras.index')
            ->with('mensaje', 'Detalle de compra actualizado exitosamente.');
    }
}