<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::all();

        return view('admin.proveedor', compact('proveedores'));
    }

    public function store(Request $request)
    {
        $Datosvalidados=$request->validate([
            'nombre_empresa' => 'required|string|max:100',
            'celular' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'rut' => 'required|string|max:12',
            'codigo_postal' => 'required|string|max:10',
            'direccion' => 'required|string|max:200',
        ],[
            'nombre_empresa.required' => 'El nombre de la empresa es obligatorio.',
            'nombre_empresa.max' => 'El nombre de la empresa no puede superar los 100 caracteres.',
            'celular.required' => 'El celular es obligatorio.',
            'celular.max' => 'El celular no puede superar los 20 caracteres.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email debe ser una dirección de correo válida.',
            'email.max' => 'El email no puede superar los 100 caracteres.',
            'rut.required' => 'El RUT es obligatorio.',
            'rut.max' => 'El RUT no puede superar los 12 caracteres.',
            'codigo_postal.required' => 'El código postal es obligatorio.',
            'codigo_postal.max' => 'El código postal no puede superar los 10 caracteres.',
            'direccion.required' => 'La dirección es obligatoria.',
            'direccion.max' => 'La dirección no puede superar los 200 caracteres.',
        ]);

        Proveedor::create([
            'nombre_empresa' => $Datosvalidados['nombre_empresa'],
            'celular' => $Datosvalidados['celular'],
            'email' => $Datosvalidados['email'],
            'rut' => $Datosvalidados['rut'],
            'codigo_postal' => $Datosvalidados['codigo_postal'],
            'direccion' => $Datosvalidados['direccion'],
        ]);

        return redirect()
           ->route ('proveedores.index')
            ->with('mensaje', 'Proveedor guardado correctamente.');

    }

    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);

        return view('admin.proveedor_edit', compact('proveedor'));
    }

    public function update(Request $request, $id)
    {
        $Datosvalidados=$request->validate([
            'nombre_empresa' => 'required|string|max:100',
            'celular' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'rut' => 'required|string|max:12',
            'codigo_postal' => 'required|string|max:10',
            'direccion' => 'required|string|max:200',
        ],[
            'nombre_empresa.required' => 'El nombre de la empresa es obligatorio.',
            'nombre_empresa.max' => 'El nombre de la empresa no puede superar los 100 caracteres.',
            'celular.required' => 'El celular es obligatorio.',
            'celular.max' => 'El celular no puede superar los 20 caracteres.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email debe ser una dirección de correo válida.',
            'email.max' => 'El email no puede superar los 100 caracteres.',
            'rut.required' => 'El RUT es obligatorio.',
            'rut.max' => 'El RUT no puede superar los 12 caracteres.',
            'codigo_postal.required' => 'El código postal es obligatorio.',
            'codigo_postal.max' => 'El código postal no puede superar los 10 caracteres.',
            'direccion.required' => 'La dirección es obligatoria.',
            'direccion.max' => 'La dirección no puede superar los 200 caracteres.',
        ]);

        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($Datosvalidados);

        return redirect()
         ->route('proveedores.index')
         ->with('mensaje', 'Proveedor actualizado correctamente.');
    }
}