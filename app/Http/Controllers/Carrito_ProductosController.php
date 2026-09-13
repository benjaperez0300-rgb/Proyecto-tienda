<?php

namespace App\Http\Controllers;

use App\Models\Carrito_Productos;
use App\Models\Carritos;
use Illuminate\Http\Request;

class Carrito_ProductosController extends Controller
{
    public function store(Request $request)
    {
        if (!session('usuario_id')) {
            return redirect()->route('login');
        }

        // Validar producto y cantidad
        $DatosValidados = $request->validate([
            'productos_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ], [
            'productos_id.required' => 'El producto es obligatorio.',
            'productos_id.exists' => 'El producto seleccionado no existe.',
            'cantidad.required' => 'La cantidad es obligatoria.',
            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'cantidad.min' => 'La cantidad debe ser mayor o igual a 1.',
        ]);

        // Buscar el carrito del usuario
        $carrito = Carrito::where(
            'usuarios_id',
            session('usuario_id')
        )->first();

        // Si no tiene carrito, crearlo
        if (!$carrito) {
            $carrito = Carrito::create([
                'usuarios_id' => session('usuario_id')
            ]);
        }

        // Buscar si el producto ya está en el carrito
        $carritoProducto = Carrito_Productos::where(
            'carritos_id',
            $carrito->id
        )
        ->where(
            'productos_id',
            $DatosValidados['productos_id']
        )
        ->first();

        // Si ya existe, aumentar cantidad
        if ($carritoProducto) {

            $carritoProducto->cantidad += $DatosValidados['cantidad'];
            $carritoProducto->save();

        } else {

            // Si no existe, agregarlo
            Carrito_Productos::create([
                'carritos_id' => $carrito->id,
                'productos_id' => $DatosValidados['productos_id'],
                'cantidad' => $DatosValidados['cantidad'],
            ]);
        }

        return redirect()
            ->route('tienda.carrito')
            ->with('success', 'Producto agregado al carrito.');
    }


    public function actualizar(Request $request, $id)
    {
        // Verificar que el usuario haya iniciado sesión
        if (!session('usuario_id')) {
            return redirect()->route('login');
        }

        // Validar cantidad
        $DatosValidados = $request->validate([
            'cantidad' => 'required|integer|min:1',
        ], [
            'cantidad.required' => 'La cantidad es obligatoria.',
            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'cantidad.min' => 'La cantidad debe ser mayor o igual a 1.',
        ]);

        // Buscar el carrito del usuario
        $carrito = Carrito::where(
            'usuarios_id',
            session('usuario_id')
        )->first();

        if (!$carrito) {
            return redirect()
                ->route('tienda.carrito')
                ->with('error', 'No se encontró tu carrito.');
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
                ->with('error', 'El producto no pertenece a tu carrito.');
        }

        // Actualizar cantidad
        $carritoProducto->update([
            'cantidad' => $DatosValidados['cantidad'],
        ]);

        return redirect()
            ->route('tienda.carrito')
            ->with('success', 'Cantidad actualizada correctamente.');
    }


    public function destroy($id)
    {
        // Verificar que el usuario haya iniciado sesión
        if (!session('usuario_id')) {
            return redirect()->route('login');
        }

        // Buscar el carrito del usuario
        $carrito = Carrito::where(
            'usuarios_id',
            session('usuario_id')
        )->first();

        if (!$carrito) {
            return redirect()
                ->route('tienda.carrito')
                ->with('error', 'No se encontró tu carrito.');
        }

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
                ->with('error', 'El producto no pertenece a tu carrito.');
        }

        $carritoProducto->delete();

        return redirect()
            ->route('tienda.carrito')
            ->with('success', 'Producto eliminado del carrito.');
    }
}