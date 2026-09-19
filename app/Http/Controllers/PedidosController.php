<?php

namespace App\Http\Controllers;

use App\Models\Carritos;
use App\Models\Pedidos_productos;
use App\Models\ProductosVariantes;
use App\Models\Pagos;
use App\Models\Pedidos;
use App\Models\Productos;
use App\Models\Usuarios;
use App\Models\EstadosPedidos;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    // =========================
    // ADMIN
    // =========================

   public function index()
{
    $pedidos = Pedidos::all();
    $usuarios = Usuarios::all();
    $productos = Productos::all();
    $estados_pedidos = EstadosPedidos::all();

    return view(
        'admin.pedidos',
        compact(
            'pedidos',
            'usuarios',
            'productos',
            'estados_pedidos'
        )
    );
}


    public function store(Request $request)
    {
        $DatosValidados = $request->validate([
            'usuarios_id' => 'required|exists:usuarios,id',
            'productos_id' => 'required|exists:productos,id',
            'estados_pedidos_id' => 'required|exists:estados_pedidos,id',
            'fecha_pedido' => 'required|date',
            'fecha_envio' => 'nullable|date',
            'subtotal' => 'required|decimal:0,2',
            'total' => 'required|decimal:0,2',
        ], [
            'usuarios_id.required' => 'El usuario es obligatorio.',
            'usuarios_id.exists' => 'El usuario seleccionado no existe.',

            'productos_id.required' => 'El producto es obligatorio.',
            'productos_id.exists' => 'El producto seleccionado no existe.',

            'estados_pedidos_id.required' => 'El estado del pedido es obligatorio.',
            'estados_pedidos_id.exists' => 'El estado del pedido seleccionado no existe.',

            'fecha_pedido.required' => 'La fecha del pedido es obligatoria.',

            'subtotal.required' => 'El subtotal es obligatorio.',
            'total.required' => 'El total es obligatorio.',
        ]);

        Pedidos::create([
            'usuarios_id' => $DatosValidados['usuarios_id'],
            'productos_id' => $DatosValidados['productos_id'],
            'estados_pedidos_id' => $DatosValidados['estados_pedidos_id'],
            'fecha_pedido' => $DatosValidados['fecha_pedido'],
            'fecha_envio' => $DatosValidados['fecha_envio'] ?? null,
            'subtotal' => $DatosValidados['subtotal'],
            'total' => $DatosValidados['total'],
        ]);

        return redirect()
            ->route('pedidos.index')
            ->with('mensaje', 'Pedido guardado correctamente.');
    }


    public function edit($id_pedidos)
    {
        $pedido = Pedidos::findOrFail($id_pedidos);

        $productos = Productos::all();
        $usuarios = Usuarios::all();
        $estados_pedidos = EstadosPedidos::all();

        return view(
            'admin.editar_pedidos',
            compact(
                'pedido',
                'usuarios',
                'productos',
                'estados_pedidos'
            )
        );
    }


    public function update(Request $request, $id_pedidos)
    {
        $DatosValidados = $request->validate([
            'usuarios_id' => 'required|exists:usuarios,id',
            'productos_id' => 'required|exists:productos,id',
            'estados_pedidos_id' => 'required|exists:estados_pedidos,id',
            'fecha_pedido' => 'required|date',
            'fecha_envio' => 'nullable|date',
            'subtotal' => 'required|decimal:0,2',
            'total' => 'required|decimal:0,2',
        ], [
            'usuarios_id.required' => 'El usuario es obligatorio.',
            'usuarios_id.exists' => 'El usuario seleccionado no existe.',

            'productos_id.required' => 'El producto es obligatorio.',
            'productos_id.exists' => 'El producto seleccionado no existe.',

            'estados_pedidos_id.required' => 'El estado del pedido es obligatorio.',
            'estados_pedidos_id.exists' => 'El estado del pedido seleccionado no existe.',

            'fecha_pedido.required' => 'La fecha del pedido es obligatoria.',

            'subtotal.required' => 'El subtotal es obligatorio.',
            'total.required' => 'El total es obligatorio.',
        ]);

        $pedido = Pedidos::findOrFail($id_pedidos);

        $pedido->update($DatosValidados);

        return redirect()
            ->route('pedidos.index')
            ->with('mensaje', 'Pedido actualizado correctamente.');
    }


    // =========================
    // CLIENTE
    // =========================

    public function direccion()
    {
        if (!session('usuario_id')) {
            return redirect()->route('login');
        }

        $usuario = Usuarios::findOrFail(
            session('usuario_id')
        );

        return view(
            'tienda.direccion',
            compact('usuario')
        );
    }

    public function confirmarCompra(Request $request)
{
    // Verificar que el usuario haya iniciado sesión
    if (!session('usuario_id')) {
        return redirect()->route('login');
    }


    // Validar método de pago
    $DatosValidados = $request->validate([
        'metodos_pagos_id' =>
            'required|exists:metodos_pagos,id',

        'numero_cuota' =>
            'required|integer|min:1',
    ], [
        'metodos_pagos_id.required' =>
            'Debes seleccionar un método de pago.',

        'metodos_pagos_id.exists' =>
            'El método de pago seleccionado no existe.',

        'numero_cuota.required' =>
            'Debes seleccionar la cantidad de cuotas.',

        'numero_cuota.integer' =>
            'La cantidad de cuotas debe ser un número entero.',

        'numero_cuota.min' =>
            'La cantidad de cuotas debe ser mayor o igual a 1.',
    ]);


    // Buscar el carrito del usuario
    $carrito = Carritos::with([
        'productos.producto',
        'productos.variante.talle',
        'productos.variante.color'
    ])
    ->where(
        'usuarios_id',
        session('usuario_id')
    )
    ->first();


    // Comprobar que exista el carrito
    if (!$carrito) {
        return redirect()
            ->route('tienda.carrito')
            ->with(
                'error',
                'No se encontró tu carrito.'
            );
    }


    // Comprobar que tenga productos
    if ($carrito->productos->count() == 0) {
        return redirect()
            ->route('tienda.carrito')
            ->with(
                'error',
                'Tu carrito está vacío.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | COMPROBAR STOCK Y CALCULAR TOTAL
    |--------------------------------------------------------------------------
    */

    $subtotal = 0;


    foreach ($carrito->productos as $item) {

        $variante = ProductosVariantes::find(
            $item->productos_variantes_id
        );


        if (!$variante) {

            return redirect()
                ->route('tienda.carrito')
                ->with(
                    'error',
                    'Una de las variantes seleccionadas ya no existe.'
                );
        }


        // Comprobar stock
        if ($item->cantidad > $variante->stock) {

            return redirect()
                ->route('tienda.carrito')
                ->with(
                    'error',
                    'No hay suficiente stock para uno de los productos.'
                );
        }


        // Calcular subtotal
        $subtotal +=
            $item->producto->precio *
            $item->cantidad;
    }


    /*
    |--------------------------------------------------------------------------
    | CREAR PEDIDO
    |--------------------------------------------------------------------------
    */

    DB::beginTransaction();


    try {
        $estadoPendiente = EstadosPedidos::where(
        'nombre',
        'Pendiente'
    )->first();

    if (!$estadoPendiente) {
    throw new \Exception(
        'No existe el estado pendiente.'
    );
}

$pedido = Pedidos::create([

    'usuarios_id' =>
        session('usuario_id'),

    'productos_id' =>
        $carrito->productos->first()->productos_id,

    'estados_pedidos_id' =>
        $estadoPendiente->id,

    'fecha_pedido' =>
        now(),

        

            'fecha_envio' =>
                null,

            'subtotal' =>
                $subtotal,

            'total' =>
                $subtotal,

        ]);


        /*
        |--------------------------------------------------------------------------
        | CREAR DETALLES DEL PEDIDO
        |--------------------------------------------------------------------------
        */

        foreach ($carrito->productos as $item) {

           Pedidos_productos::create([
    'pedidos_id' => $pedido->id,
    'producto_variantes_id' => $item->productos_variantes_id,
    'cantidad' => $item->cantidad,
    'precio' => $item->producto->precio,
]);
        }


        /*
        |--------------------------------------------------------------------------
        | CREAR PAGO
        |--------------------------------------------------------------------------
        */

        Pagos::create([

            'pedidos_id' =>
                $pedido->id,

            'metodos_pagos_id' =>
                $DatosValidados['metodos_pagos_id'],

            'monto' =>
                $subtotal,

            'numero_cuota' =>
                $DatosValidados['numero_cuota'],

            'fecha_pago' =>
                now(),

        ]);


        /*
        |--------------------------------------------------------------------------
        | DESCONTAR STOCK
        |--------------------------------------------------------------------------
        */

        foreach ($carrito->productos as $item) {

            $variante = ProductosVariantes::find(
                $item->productos_variantes_id
            );


            $variante->stock =
                $variante->stock -
                $item->cantidad;


            $variante->save();
        }


        /*
        |--------------------------------------------------------------------------
        | VACIAR CARRITO
        |--------------------------------------------------------------------------
        */

        foreach ($carrito->productos as $item) {

            $item->delete();
        }


        // Confirmar todos los cambios
        DB::commit();


        return redirect()
            ->route('tienda.pedidos')
            ->with(
                'success',
                'Compra realizada correctamente.'
            );

    } catch (\Exception $e) {

        // Si algo falla, deshacer todo
        DB::rollBack();


        return redirect()
            ->route('checkout')
           ->with('error', $e->getMessage());
            
    }
}


    public function misPedidos()
    {
        if (!session('usuario_id')) {
            return redirect()->route('login');
        }

        $pedidos = Pedidos::where(
            'usuarios_id',
            session('usuario_id')
        )
        ->with([
    'estadosPedido',
    'productosPedido.variante.talle',
    'productosPedido.variante.color'
    ])
        ->orderBy('fecha_pedido', 'desc')
        ->get();

        return view(
            'tienda.pedidos',
            compact('pedidos')
        );
    }
}