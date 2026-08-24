<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categorias::all();

        return view('admin.categorias', compact('categorias'));
    }

    public function store(Request $request)
    {
        $datosValidados = $request->validate(
            [
                'nombre' => 'required|string|max:100',
                'descripcion' => 'nullable|string|max:255',
            ],
            [
                'nombre.required' => 'El nombre es obligatorio.',
                'nombre.max' => 'El nombre no puede superar los 100 caracteres.',
                'descripcion.max' => 'La descripción no puede superar los 255 caracteres.',
            ]
        );

        Categorias::create([
            'nombre' => $datosValidados['nombre'],
            'descripcion' => $datosValidados['descripcion'] ?? null,
        ]);

        return redirect()
            ->route('categorias.index')
            ->with('mensaje', 'Categoría guardada correctamente.');
    }

    public function edit($id)
    {
        $categoria = Categorias::findOrFail($id);

        return view('admin.Categorias_edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $datosValidados = $request->validate(
            [
                'nombre' => 'required|string|max:100',
                'descripcion' => 'nullable|string|max:255',
            ],
            [
                'nombre.required' => 'El nombre es obligatorio.',
                'nombre.max' => 'El nombre no puede superar los 100 caracteres.',
                'descripcion.max' => 'La descripción no puede superar los 255 caracteres.',
            ]
        );

        $categoria = Categorias::findOrFail($id);

        $categoria->update([
            'nombre' => $datosValidados['nombre'],
            'descripcion' => $datosValidados['descripcion'] ?? null,
        ]);

        return redirect()
            ->route('categorias.index')
            ->with('mensaje', 'Categoría actualizada correctamente.');
    }
}