<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Proveedores</title>
    <link
        rel="stylesheet"
        href="{{ asset('css/styles.css') }}"
    >
</head>

<body>
  
 <main class="contenedor"> 

    <h1>Proveedores</h1>

    @if (session('mensaje'))
        <div class="mensaje mensaje-exito">
            {{ session('mensaje') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mensaje mensaje-error">

            <p>Revisa los siguientes campos:</p>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif

    <h2>Registrar proveedor</h2>
    <form
        action="{{ route('proveedores.store') }}"
        method="POST"
    >
        @csrf
        <div class="campo">

            <label for="nombre_empresa">
                Nombre de empresa
            </label>

            <input
                type="text"
                id="nombre_empresa"
                name="nombre_empresa"
                required
            >
        </div>
        <div class="campo">

            <label for="celular">
                Celular
            </label>

            <input
                type="text"
                id="celular"
                name="celular"
                required
            >
        </div>
        <div class="campo">

            <label for="email">
                Email
            </label>

            <input
                type="email"
                id="email"
                name="email"
                required
            >
        </div>
        <div class="campo">

            <label for="rut">
                RUT
            </label>

            <input
                type="text"
                id="rut"
                name="rut"
                required
            >
        </div>
        <div class="campo">

            <label for="codigo_postal">
                Codigo postal
            </label>

            <input
                type="text"
                id="codigo_postal"
                name="codigo_postal"
                required
            >
        </div>

          <div class="campo">

            <label for="Direccion">
                Dirección
            </label>

            <input
                type="text"
                id="direccion"
                name="direccion"
                required
            >
        </div>


        <button type="submit">
            Registrar proveedor
        </button>
    </form>

    <h2>Proveedores registrados</h2>
    @if ($proveedores->isEmpty())
        <p>No hay proveedores registrados.</p>
    @else
       <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre de empresa</th>
                    <th>Celular</th>
                    <th>Email</th>
                    <th>RUT</th>
                    <th>Código postal</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proveedores as $proveedor)
                    <tr>
                        <td>{{ $proveedor->id }}</td>
                        <td>{{ $proveedor->nombre_empresa }}</td>
                        <td>{{ $proveedor->celular }}</td>
                        <td>{{ $proveedor->email }}</td>
                        <td>{{ $proveedor->rut }}</td>
                        <td>{{ $proveedor->codigo_postal }}</td>
                        <td>{{ $proveedor->direccion }}</td>
                        <td>
                            <a href="{{ route('proveedor_edit', ['id' => $proveedor->id]) }}">
                                Editar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

