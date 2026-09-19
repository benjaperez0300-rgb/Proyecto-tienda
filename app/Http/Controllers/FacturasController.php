<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Pedidos;
use Illuminate\Http\Request;

class FacturasController extends Controller
{
    // MOSTRAR FACTURAS
    public function index()
    {
        $facturas = Factura::all();
        $pedidos = Pedidos::all();

        return view(
            'admin.facturas',
            compact('facturas', 'pedidos')
        );
    }

    // GUARDAR FACTURA
    public function store(Request $request)
    {
        $Datosvalidados = $request->validate([
            'pedidos_id' => 'required|exists:pedidos,id',
            'fecha_factura' => 'required|date',
            'numero_factura' => 'required|string|max:100',
            'subtotal' => 'required|numeric|min:0',
            'impuestos' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
        ], [
            'pedidos_id.required' => 'El pedido es obligatorio.',
            'pedidos_id.exists' => 'El pedido seleccionado no existe.',

            'fecha_factura.required' => 'La fecha de factura es obligatoria.',

            'numero_factura.required' => 'El número de factura es obligatorio.',
            'numero_factura.max' => 'El número de factura no puede superar los 100 caracteres.',

            'subtotal.required' => 'El subtotal es obligatorio.',
            'subtotal.numeric' => 'El subtotal debe ser un número válido.',

            'impuestos.required' => 'Los impuestos son obligatorios.',
            'impuestos.numeric' => 'Los impuestos deben ser un número válido.',

            'total.required' => 'El total es obligatorio.',
            'total.numeric' => 'El total debe ser un número válido.',
        ]);

        Factura::create([
            'pedidos_id' => $Datosvalidados['pedidos_id'],
            'fecha_factura' => $Datosvalidados['fecha_factura'],
            'numero_factura' => $Datosvalidados['numero_factura'],
            'subtotal' => $Datosvalidados['subtotal'],
            'impuestos' => $Datosvalidados['impuestos'],
            'total' => $Datosvalidados['total'],
        ]);

        return redirect()
            ->route('facturas.index')
            ->with('mensaje', 'Factura guardada correctamente.');
    }

    // MOSTRAR FORMULARIO DE EDICIÓN
    public function edit($id)
    {
        $factura = Factura::findOrFail($id);
        $pedidos = Pedidos::all();

        return view(
            'admin.facturas_edit',
            compact('factura', 'pedidos')
        );
    }

    // ACTUALIZAR FACTURA
    public function update(Request $request, $id)
    {
        $Datosvalidados = $request->validate([
            'pedidos_id' => 'required|exists:pedidos,id',
            'fecha_factura' => 'required|date',
            'numero_factura' => 'required|string|max:100',
            'subtotal' => 'required|numeric|min:0',
            'impuestos' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
        ], [
            'pedidos_id.required' => 'El pedido es obligatorio.',
            'pedidos_id.exists' => 'El pedido seleccionado no existe.',

            'fecha_factura.required' => 'La fecha de factura es obligatoria.',

            'numero_factura.required' => 'El número de factura es obligatorio.',
            'numero_factura.max' => 'El número de factura no puede superar los 100 caracteres.',

            'subtotal.required' => 'El subtotal es obligatorio.',
            'subtotal.numeric' => 'El subtotal debe ser un número válido.',

            'impuestos.required' => 'Los impuestos son obligatorios.',
            'impuestos.numeric' => 'Los impuestos deben ser un número válido.',

            'total.required' => 'El total es obligatorio.',
            'total.numeric' => 'El total debe ser un número válido.',
        ]);

        $factura = Factura::findOrFail($id);

        $factura->update([
            'pedidos_id' => $Datosvalidados['pedidos_id'],
            'fecha_factura' => $Datosvalidados['fecha_factura'],
            'numero_factura' => $Datosvalidados['numero_factura'],
            'subtotal' => $Datosvalidados['subtotal'],
            'impuestos' => $Datosvalidados['impuestos'],
            'total' => $Datosvalidados['total'],
        ]);

        return redirect()
            ->route('facturas.index')
            ->with('mensaje', 'Factura actualizada correctamente.');
    }
}