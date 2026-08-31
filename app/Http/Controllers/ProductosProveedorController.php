<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Proveedor;
use App\Models\ProductosProveedor;
use Illuminate\Http\Request;

class ProductosProveedorController extends Controller
{
    public function index()
    {
        $productosProveedor = ProductosProveedor::with('producto', 'proveedor')->get();

        return view('admin.productos_proveedor', compact('productosProveedor'));
    }
    public function store(Request $request)
    {
        $Datosvalidados=$request->validate([
            'productos_id' => 'required|exists:productos,id_producto',
            'proveedores_id' => 'required|exists:proveedor,id',
        ],[
            'productos_id.required' => 'El producto es obligatorio.',
            'productos_id.exists' => 'El producto seleccionado no existe.',
            'proveedores_id.required' => 'El proveedor es obligatorio.',
            'proveedores_id.exists' => 'El proveedor seleccionado no existe.',
        ]);

        ProductosProveedor::create([
           'productos_id' => $Datosvalidados['productos_id'],
           'proveedores_id' => $Datosvalidados['proveedores_id'], 
        ]);

        return redirect()
           ->route ('productos_proveedor.index')
           ->with('mensaje', 'Producto-Proveedor guardado correctamente.');
    }
}