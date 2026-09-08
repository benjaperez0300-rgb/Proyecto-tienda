<?php

namespace App\Http\Controllers;

use App\Models\Pagos;
use App\Models\Pedidos;
use App\Models\MetodosPagos;
use Illuminate\Http\Request;

class PagosController extends Controller
{
    public function index()
    {
        $pagos = Pagos::all();

        return view('admin.pagos', compact('pagos'));
    }

    public function store(Request $request)
    {
        $Datosvalidados=$request->validate([
            'pedidos_id' => 'required|exists:pedidos,id',
            'metodos_pagos_id' => 'required|exists:metodos_pagos,id',
            'fecha_pago' => 'required|date',
            'monto' => 'required|numeric|min:0',
            'numero_cuota' => 'nullable|integer|min:1',
        ],[
            'pedidos_id.required' => 'El pedido es obligatorio.',
            'pedidos_id.exists' => 'El pedido seleccionado no existe.',
            'metodos_pagos_id.required' => 'El método de pago es obligatorio.',
            'metodos_pagos_id.exists' => 'El método de pago seleccionado no existe.',
            'fecha_pago.required' => 'La fecha de pago es obligatoria.',
            'monto.required' => 'El monto es obligatorio.',
            'monto.numeric' => 'El monto debe ser un número válido.',
            'numero_cuota.integer' => 'El número de cuota debe ser un número entero.',
        ]);

        Pagos::create([
            'pedidos_id' => $Datosvalidados['pedidos_id'],
            'metodos_pagos_id' => $Datosvalidados['metodos_pagos_id'],
            'fecha_pago' => $Datosvalidados['fecha_pago'],
            'monto' => $Datosvalidados['monto'],
            'numero_cuota' => $Datosvalidados['numero_cuota'],
        ]);

        return redirect()
           ->route ('pagos.index')
           ->with('mensaje', 'Pago guardado correctamente.');
    }
    public function edit($id)
    {
        $pago = Pagos::findOrFail($id);
        $pedidos = Pedidos::all();
        $metodosPagos = MetodosPagos::all();

        return view('admin.pagos_edit', compact('pago', 'pedidos', 'metodosPagos'));
    }
    public function update(Request $request, $id)
    {
        $Datosvalidados=$request->validate([
            'pedidos_id' => 'required|exists:pedidos,id',
            'metodos_pagos_id' => 'required|exists:metodos_pagos,id',
            'fecha_pago' => 'required|date',
            'monto' => 'required|numeric|min:0',
            'numero_cuota' => 'nullable|integer|min:1',
        ],[
            'pedidos_id.required' => 'El pedido es obligatorio.',
            'pedidos_id.exists' => 'El pedido seleccionado no existe.',
            'metodos_pagos_id.required' => 'El método de pago es obligatorio.',
            'metodos_pagos_id.exists' => 'El método de pago seleccionado no existe.',
            'fecha_pago.required' => 'La fecha de pago es obligatoria.',
            'monto.required' => 'El monto es obligatorio.',
            'monto.numeric' => 'El monto debe ser un número válido.',
            'numero_cuota.integer' => 'El número de cuota debe ser un número entero.',
        ]);

        $pago = Pagos::findOrFail($id);
        $pago->update($Datosvalidados);

        return redirect()
           ->route ('pagos.index')
           ->with('mensaje', 'Pago actualizado correctamente.');
    }
}