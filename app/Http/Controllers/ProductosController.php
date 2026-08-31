<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Marcas;
use App\Models\Categorias;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = Productos::all();

        return view('admin.productos', compact('productos'));
    }

    public function store(Request $request)
    {
        $Datosvalidados=$request->validate([
            'nombre' => 'required|string|max:100',
            'codigo_barra' => 'required|string|max:20',
            'precio' => 'required|numeric',
            'material' => 'required|string|max:50',
            'genero' => 'required|string|max:20',
            'marcas_id' => 'required|exists:marcas,id_marca',
            'categorias_id' => 'required|exists:categorias,id_categoria',
        ],[
            'nombre.required' => 'El nombre del producto es obligatorio.',
            'nombre.max' => 'El nombre del producto no puede superar los 100 caracteres.',
            'codigo_barra.required' => 'El código de barra es obligatorio.',
            'codigo_barra.max' => 'El código de barra no puede superar los 20 caracteres.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número válido.',
            'material.required' => 'El material es obligatorio.',
            'material.max' => 'El material no puede superar los 50 caracteres.',
            'genero.required' => 'El género es obligatorio.',
            'genero.max' => 'El género no puede superar los 20 caracteres.',
            'marcas_id.required' => 'La marca es obligatoria.',
            'marcas_id.exists' => 'La marca seleccionada no existe.',
            'categorias_id.required' => 'La categoría es obligatoria.',
            'categorias_id.exists' => 'La categoría seleccionada no existe.',
        ]);

        Productos::create([
            'nombre' => $Datosvalidados['nombre'],
            'codigo_barra' => $Datosvalidados['codigo_barra'],
            'precio' => $Datosvalidados['precio'],
            'material' => $Datosvalidados['material'],
            'genero' => $Datosvalidados['genero'],
            'marcas_id' => $Datosvalidados['marcas_id'],
            'categorias_id' => $Datosvalidados['categorias_id'],
        ]);

        return redirect()
           ->route ('productos.index')
           ->with('mensaje', 'Producto guardado correctamente.');
    }
    public function edit($id_producto)
    {
        $producto = Productos::findOrFail($id_producto);
        $marcas = Marcas::all();
        $categorias = Categorias::all();

        return view('admin.editar_productos', compact('producto', 'marcas', 'categorias'));
    }
    public function update(Request $request, $id_producto)
    {
        $Datosvalidados=$request->validate([
            'nombre' => 'required|string|max:100',
            'codigo_barra' => 'required|string|max:20',
            'precio' => 'required|numeric',
            'material' => 'required|string|max:50',
            'genero' => 'required|string|max:20',
            'marcas_id' => 'required|exists:marcas,id_marca',
            'categorias_id' => 'required|exists:categorias,id_categoria',
        ],[
            'nombre.required' => 'El nombre del producto es obligatorio.',
            'nombre.max' => 'El nombre del producto no puede superar los 100 caracteres.',
            'codigo_barra.required' => 'El código de barra es obligatorio.',
            'codigo_barra.max' => 'El código de barra no puede superar los 20 caracteres.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número válido.',
            'material.required' => 'El material es obligatorio.',
            'material.max' => 'El material no puede superar los 50 caracteres.',
            'genero.required' => 'El género es obligatorio.',
            'genero.max' => 'El género no puede superar los 20 caracteres.',
            'marcas_id.required' => 'La marca es obligatoria.',
            'marcas_id.exists' => 'La marca seleccionada no existe.',
            'categorias_id.required' => 'La categoría es obligatoria.',
            'categorias_id.exists' => 'La categoría seleccionada no existe.',
        ]);

        $producto = Productos::findOrFail($id_producto);
        $producto->update($Datosvalidados);

        return redirect()
           ->route('productos.index')
           ->with('mensaje', "Producto actualizado correctamente.");
    }
}