<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use App\Models\Pedidos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuarios::all();

        return view('tienda.pagina', compact('usuarios'));
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
            'fecha_nac' => 'nullable|date',

        ], [

            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección válida.',
            'email.unique' => 'El correo electrónico ya está en uso.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',

        ]);


        Usuarios::create([

            'nombre' => $DatosValidados['nombre'],
            'apellido' => $DatosValidados['apellido'],
            'email' => $DatosValidados['email'],
            'password' => bcrypt($DatosValidados['password']),
            'telefono' => $DatosValidados['telefono'] ?? null,
            'direccion' => $DatosValidados['direccion'] ?? null,
            'fecha_nac' => $DatosValidados['fecha_nac'] ?? null,
            'rol' => 'cliente',

        ]);


        return redirect()
            ->route('tienda.pagina')
            ->with('success', 'Usuario creado exitosamente.');
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
            'email' => 'required|email|unique:usuarios,email,' . $id . ',id',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'fecha_nac' => 'nullable|date',

        ], [

            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección válida.',
            'email.unique' => 'El correo electrónico ya está en uso.',

        ]);


        $usuario = Usuarios::findOrFail($id);

        $usuario->update($DatosValidados);


        return redirect()
            ->route('tienda.pagina')
            ->with('success', 'Usuario actualizado exitosamente.');
    }


   
    public function perfil()
    {
        if (!session('usuario_id')) {
            return redirect()->route('login');
        }


        $usuario = Usuarios::findOrFail(
            session('usuario_id')
        );


        $pedidos = Pedidos::where(
            'usuarios_id',
            $usuario->id
        )
        ->orderBy('fecha_pedido', 'desc')
        ->get();


        return view(
            'tienda.perfil',
            compact('usuario', 'pedidos')
        );
    }


    
    public function editPerfil()
    {
        if (!session('usuario_id')) {
            return redirect()->route('login');
        }


        $usuario = Usuarios::findOrFail(
            session('usuario_id')
        );


        return view(
            'tienda.edit-perfil',
            compact('usuario')
        );
    }


    
    public function updatePerfil(Request $request)
    {
        if (!session('usuario_id')) {
            return redirect()->route('login');
        }


        $usuario = Usuarios::findOrFail(
            session('usuario_id')
        );


        $DatosValidados = $request->validate([

            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $usuario->id . ',id',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'fecha_nac' => 'nullable|date',

        ], [

            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección válida.',
            'email.unique' => 'El correo electrónico ya está en uso.',

        ]);


        $usuario->update($DatosValidados);


        return redirect()
            ->route('perfil')
            ->with(
                'mensaje',
                'Perfil actualizado correctamente.'
            );
    }


    
    public function login(Request $request)
    {
        $DatosValidados = $request->validate([

            'email' => 'required|email',
            'password' => 'required|string',

        ]);


        $usuario = Usuarios::where(
            'email',
            $DatosValidados['email']
        )->first();


        if (
            !$usuario ||
            !Hash::check(
                $DatosValidados['password'],
                $usuario->password
            )
        ) {

            return back()->withErrors([

                'email' => 'El correo o la contraseña son incorrectos.'

            ]);
        }


        $request->session()->regenerate();


        session([

            'usuario_id' => $usuario->id,
            'usuario_rol' => $usuario->rol,

        ]);


        if ($usuario->rol === 'admin') {

            return redirect()->route('admin.inicio');

        }


        return redirect()->route('tienda.pagina');
    }


   
    public function showLogin()
    {
        return view('tienda.iniciar-sesion');
    }


    
    public function logout(Request $request)
    {
        $request->session()->forget([

            'usuario_id',
            'usuario_rol',

        ]);


        $request->session()->invalidate();

        $request->session()->regenerateToken();


        return redirect()->route('login');
    }

}
