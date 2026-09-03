<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function index()
    {
        $usuarios = Usuarios::all();
        return view('tienda.index', compact('usuarios'));
    }

    public function create()
    {
        return view('tienda.create');
    }

    public function store(Request $request)
    {
        $DatosValidados = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:6',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'rol' => 'required|string|max:50',
        ],[
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección válida.',
            'email.unique' => 'El correo electrónico ya está en uso.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'rol.required' => 'El rol es obligatorio.',
        ]);

        Usuarios::create([
            'nombre' => $DatosValidados['nombre'],
            'apellido' => $DatosValidados['apellido'],
            'email' => $DatosValidados['email'],
            'password' => bcrypt($DatosValidados['password']),
            'telefono' => $DatosValidados['telefono'] ?? null,
            'direccion' => $DatosValidados['direccion'] ?? null,
            'fecha_nacimiento' => $DatosValidados['fecha_nacimiento'] ?? null,
            'rol' => $DatosValidados['rol'],
        ]);

        return redirect()->route('tienda.index')->with('success', 'Usuario creado exitosamente.');
    }
    public function edit($id)
    {
        $usuario = Usuarios::findOrFail($id);
        return view('tienda.edit', compact('usuario'));
    }
   public function update(Request $request, $id)
    {
        $DatosValidados = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $id . ',id_usuario',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'rol' => 'required|string|max:50',
        ],[
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección válida.',
            'email.unique' => 'El correo electrónico ya está en uso.',
            'rol.required' => 'El rol es obligatorio.',
        ]);

        $usuario = Usuarios::findOrFail($id);
        $usuario->update($DatosValidados);

        return redirect()->route('tienda.index')->with('success', 'Usuario actualizado exitosamente.');
    } 
}