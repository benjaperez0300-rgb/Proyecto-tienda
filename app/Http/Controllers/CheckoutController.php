<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use App\Models\Carritos;
use App\Models\MetodosPagos;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        if (!session()->has('usuario_id')) {
            return redirect()->route('login');
        }

        $usuario = Usuarios::find(session('usuario_id'));

        $carrito = Carritos::where(
            'usuarios_id',
            session('usuario_id')
        )
        ->with([
            'productos.producto',
            'productos.variante.talle',
            'productos.variante.color'
        ])
        ->first();

        if (!$carrito || $carrito->productos->count() == 0) {
            return redirect()
                ->route('tienda.carrito')
                ->with('error', 'Tu carrito está vacío.');
        }

        $metodosPagos = MetodosPagos::all();

        return view(
            'tienda.checkout',
            compact(
                'usuario',
                'carrito',
                'metodosPagos'
            )
        );
    }
}