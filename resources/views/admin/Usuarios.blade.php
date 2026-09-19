<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <title>Registrar Usuarios</title>
</head>

<body>

    <main class="contenedor">

        @if(session('mensaje'))
            <div class="mensaje mensaje-exito">
                {{ session('mensaje') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mensaje mensaje-error">

                <p>Revisa los siguientes campos:</p>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif


        <h1>Registrar Usuarios</h1>


        <form action="{{ route('usuarios.storeAdmin') }}" method="POST">

            @csrf


            <div class="campo">
                <label for="nombre">Nombre:</label>

                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    required
                >
            </div>


            <div class="campo">
                <label for="apellido">Apellido:</label>

                <input
                    type="text"
                    id="apellido"
                    name="apellido"
                    required
                >
            </div>


            <div class="campo">
                <label for="fecha_nac">Fecha de Nacimiento:</label>

                <input
                    type="date"
                    id="fecha_nac"
                    name="fecha_nac"
                    required
                >
            </div>


            <div class="campo">
                <label for="email">Correo Electrónico:</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    required
                >
            </div>


            <div class="campo">
                <label for="password">Contraseña:</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                >
            </div>


            <div class="campo">
                <label for="telefono">Teléfono:</label>

                <input
                    type="text"
                    id="telefono"
                    name="telefono"
                    required
                >
            </div>


            <div class="campo">
                <label for="direccion">Dirección:</label>

                <input
                    type="text"
                    id="direccion"
                    name="direccion"
                    required
                >
            </div>


            <div class="campo">
                <label for="rol">Rol:</label>

                <select id="rol" name="rol" required>

                    <option value="">Seleccionar rol</option>

                    <option value="cliente">
                        Cliente
                    </option>

                    <option value="admin">
                        Administrador
                    </option>

                </select>
            </div>


            <button type="submit">
                Registrar
            </button>

        </form>


        <h2>Usuarios Registrados</h2>


        @if($usuarios->isEmpty())

            <p>No hay usuarios registrados.</p>

        @else

            <table>

                <thead>

                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Correo Electrónico</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>

                </thead>


                <tbody>

                    @foreach($usuarios as $usuario)

                        <tr>

                            <td>{{ $usuario->nombre }}</td>

                            <td>{{ $usuario->apellido }}</td>

                            <td>{{ $usuario->fecha_nac }}</td>

                            <td>{{ $usuario->email }}</td>

                            <td>{{ $usuario->telefono }}</td>

                            <td>{{ $usuario->direccion }}</td>

                            <td>{{ $usuario->rol }}</td>

                            <td>
                                <a href="{{ route('usuarios.edit', $usuario->id) }}">
                                    Editar
                                </a>
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        @endif

    </main>

</body>
</html>

