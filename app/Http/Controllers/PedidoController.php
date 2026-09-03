<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use App\Models\Productos;
use App\Models\Usuarios;
use App\Models\EstadosPedidos;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function index ()
    {


        $pedidos = Pedidos::all();
        
        return view('admin.pedidos', compact('pedidos'));
    }

    public function store(Request $request)
    {
        $Datosvalidados=$request->validate([
            'usuarios_id' => 'required|exists:usuarios,usuarios_id',
            'productos_id' => 'required|exists:productos,productos_id',
            'estados_pedidos_id' => 'required|exists:estados_pedidos,estados_pedidos_id',
            'fecha_pedido' => 'required|date',
            'fecha_envio' => 'nullable|date',
            'subtotal' => 'required|decimal:0,2',
            'total' => 'required|decimal:0,2',
        ],[
            'usuarios_id.required' => 'El usuario es obligatorio.',
            'usuarios_id.exists' => 'El usuario seleccionado no existe.',
            'productos_id.required' => 'El producto es obligatorio.',
            'productos_id.exists' => 'El producto seleccionado no existe.',
            'estados_pedidos_id.required' => 'El estado del pedido es obligatorio.',
            'estados_pedidos_id.exists' => 'El estado del pedido seleccionado no existe.',
            'fecha_pedido.required' => 'La fecha del pedido es obligatoria.',
            'fecha_envio.nullable' => 'La fecha de envío es opcional.',
            'subtotal.required' => 'El subtotal es obligatorio.',
            'total.required' => 'El total es obligatorio.',
        ]);

        Pedidos::create([
            'usuarios_id' => $Datosvalidados['usuarios_id'],
            'productos_id' => $Datosvalidados['productos_id'],
            'estados_pedidos_id' => $Datosvalidados['estados_pedidos_id'],
            'fecha_pedido' => $Datosvalidados['fecha_pedido'],
            'fecha_envio' => $Datosvalidados['fecha_envio'],
            'subtotal' => $Datosvalidados['subtotal'],
            'total' => $Datosvalidados['total'],
        ]);

        return redirect()
           ->route ('pedidos.index')
           ->with('mensaje', 'Pedido guardado correctamente.');
    }
    public function edit($id_pedidos)
    {
        $pedidos = Pedidos::findOrFail($id_pedidos);
        $productos = Productos::all();
        $usuarios = Usuarios::all();
        $estados_pedidos = EstadosPedidos::all();

        return view('admin.editar_pedidos', compact('pedidos', 'usuarios', 'productos','estados_pedidos' ));
    }
    public function update(Request $request, $id_pedidos)
    {
        $Datosvalidados=$request->validate([
           'usuarios_id' => 'required|exists:usuarios,usuarios_id',
            'productos_id' => 'required|exists:productos,productos_id',
            'estados_pedidos_id' => 'required|exists:estados_pedidos,estados_pedidos_id',
            'fecha_pedido' => 'required|date',
            'fecha_envio' => 'nullable|date',
            'subtotal' => 'required|decimal:0,2',
            'total' => 'required|decimal:0,2',
        ],[
            'usuarios_id.required' => 'El usuario es obligatorio.',
            'usuarios_id.exists' => 'El usuario seleccionado no existe.',
            'productos_id.required' => 'El producto es obligatorio.',
            'productos_id.exists' => 'El producto seleccionado no existe.',
            'estados_pedidos_id.required' => 'El estado del pedido es obligatorio.',
            'estados_pedidos_id.exists' => 'El estado del pedido seleccionado no existe.',
            'fecha_pedido.required' => 'La fecha del pedido es obligatoria.',
            'fecha_envio.nullable' => 'La fecha de envío es opcional.',
            'subtotal.required' => 'El subtotal es obligatorio.',
            'total.required' => 'El total es obligatorio.',
        ]);

        $pedidos = Pedidos::findOrFail($id_pedidos);
        $pedidos->update($Datosvalidados);

        return redirect()
           ->route('pedidos.index')
           ->with('mensaje', "Pedido actualizado correctamente.");
    }
    


}    







