<?php

namespace App\Http\Controllers;

use App\Models\Carrito_Productos;
use App\Models\Carritos;
use App\Models\ProductosVariantes;
use Illuminate\Http\Request;

class Carrito_ProductosController extends Controller
{

    public function store(Request $request)
    {
        // Verificar que el usuario haya iniciado sesión
        if (!session('usuario_id')) {
            return redirect()->route('login');
        }


        // Validar los datos recibidos
        $DatosValidados = $request->validate([

            'productos_id' => 'required|exists:productos,id',

            'productos_variantes_id' =>
                'required|exists:producto_variantes,id',

            'cantidad' =>
                'required|integer|min:1',

        ], [

            'productos_id.required' =>
                'El producto es obligatorio.',

            'productos_id.exists' =>
                'El producto seleccionado no existe.',

            'productos_variantes_id.required' =>
                'Debes seleccionar una variante.',

            'productos_variantes_id.exists' =>
                'La variante seleccionada no existe.',

            'cantidad.required' =>
                'La cantidad es obligatoria.',

            'cantidad.integer' =>
                'La cantidad debe ser un número entero.',

            'cantidad.min' =>
                'La cantidad debe ser mayor o igual a 1.',

        ]);


        // Buscar la variante seleccionada
        $variante = ProductosVariantes::findOrFail(
            $DatosValidados['productos_variantes_id']
        );


        // Comprobar que la variante pertenece al producto
        if (
            $variante->productos_id !=
            $DatosValidados['productos_id']
        ) {

            return redirect()
                ->back()
                ->with('error', 'La variante seleccionada no pertenece a este producto.');
        }


        // Comprobar stock
        if (
            $DatosValidados['cantidad'] >
            $variante->stock
        ) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'No hay suficiente stock para la cantidad seleccionada.'
                );
        }


        // Buscar el carrito del usuario
        $carrito = Carritos::where(
            'usuarios_id',
            session('usuario_id')
        )->first();


        // Si no tiene carrito, crearlo
        if (!$carrito) {

            $carrito = Carritos::create([
                'usuarios_id' => session('usuario_id')
            ]);

        }


        // Buscar si esa MISMA variante ya está en el carrito
        $carritoProducto = Carrito_Productos::where(
            'carritos_id',
            $carrito->id
        )
        ->where(
            'productos_id',
            $DatosValidados['productos_id']
        )
        ->where(
            'productos_variantes_id',
            $DatosValidados['productos_variantes_id']
        )
        ->first();


        // Si ya existe, aumentar cantidad
        if ($carritoProducto) {

            $nuevaCantidad =
                $carritoProducto->cantidad +
                $DatosValidados['cantidad'];


            // Comprobar nuevamente el stock
            if ($nuevaCantidad > $variante->stock) {

                return redirect()
                    ->back()
                    ->with(
                        'error',
                        'No hay suficiente stock para agregar esa cantidad.'
                    );
            }


            $carritoProducto->update([
                'cantidad' => $nuevaCantidad
            ]);

        } else {

            // Si no existe, agregarlo
            Carrito_Productos::create([

                'carritos_id' =>
                    $carrito->id,

                'productos_id' =>
                    $DatosValidados['productos_id'],

                'productos_variantes_id' =>
                    $DatosValidados['productos_variantes_id'],

                'cantidad' =>
                    $DatosValidados['cantidad'],

            ]);
        }


        return redirect()
            ->route('tienda.carrito')
            ->with(
                'success',
                'Producto agregado al carrito.'
            );
    }

    public function update(Request $request, $id)
    {
        // Verificar que el usuario haya iniciado sesión
        if (!session('usuario_id')) {
            return redirect()->route('login');
        }


        // Validar cantidad
        $DatosValidados = $request->validate([

            'cantidad' =>
                'required|integer|min:1',

        ], [

            'cantidad.required' =>
                'La cantidad es obligatoria.',

            'cantidad.integer' =>
                'La cantidad debe ser un número entero.',

            'cantidad.min' =>
                'La cantidad debe ser mayor o igual a 1.',

        ]);


        // Buscar el carrito del usuario
        $carrito = Carritos::where(
            'usuarios_id',
            session('usuario_id')
        )->first();


        if (!$carrito) {

            return redirect()
                ->route('tienda.carrito')
                ->with(
                    'error',
                    'No se encontró tu carrito.'
                );
        }


        // Buscar el producto dentro del carrito
        $carritoProducto = Carrito_Productos::where(
            'id',
            $id
        )
        ->where(
            'carritos_id',
            $carrito->id
        )
        ->first();


        if (!$carritoProducto) {

            return redirect()
                ->route('tienda.carrito')
                ->with(
                    'error',
                    'El producto no pertenece a tu carrito.'
                );
        }


        // Buscar la variante
        $variante = ProductosVariantes::findOrFail(
            $carritoProducto->productos_variantes_id
        );


        // Comprobar stock
        if (
            $DatosValidados['cantidad'] >
            $variante->stock
        ) {

            return redirect()
                ->route('tienda.carrito')
                ->with(
                    'error',
                    'No hay suficiente stock para esa cantidad.'
                );
        }


        // Actualizar cantidad
        $carritoProducto->update([

            'cantidad' =>
                $DatosValidados['cantidad'],

        ]);


        return redirect()
            ->route('tienda.carrito')
            ->with(
                'success',
                'Cantidad actualizada correctamente.'
            );
    }


    public function destroy($id)
    {
        // Verificar que el usuario haya iniciado sesión
        if (!session('usuario_id')) {
            return redirect()->route('login');
        }


        // Buscar el carrito del usuario
        $carrito = Carritos::where(
            'usuarios_id',
            session('usuario_id')
        )->first();


        if (!$carrito) {

            return redirect()
                ->route('tienda.carrito')
                ->with(
                    'error',
                    'No se encontró tu carrito.'
                );
        }


        // Buscar el producto dentro del carrito
        $carritoProducto = Carrito_Productos::where(
            'id',
            $id
        )
        ->where(
            'carritos_id',
            $carrito->id
        )
        ->first();


        if (!$carritoProducto) {

            return redirect()
                ->route('tienda.carrito')
                ->with(
                    'error',
                    'El producto no pertenece a tu carrito.'
                );
        }


        // Eliminar
        $carritoProducto->delete();


        return redirect()
            ->route('tienda.carrito')
            ->with(
                'success',
                'Producto eliminado del carrito.'
            );
    }
}