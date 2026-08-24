<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <title>Editar Proveedor</title>
    <link
        rel="stylesheet"
        href="{{ asset('css/styles.css') }}"
    >
</head>

<body>
  <main class="contenedor">

    <h1>Editar Proveedor</h1>

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

    <form
        action="{{ route('proveedores.update', $proveedor->id) }}"
        method="POST"
    >
        @csrf
        @method('PUT')

        <div class="campo">

            <label for="nombre_empresa">
                Nombre de empresa
            </label>

            <input
                type="text"
                id="nombre_empresa"
                name="nombre_empresa"
                value="{{ old('nombre_empresa', $proveedor->nombre_empresa) }}"
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
                value="{{ old('celular', $proveedor->celular) }}"
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
                value="{{ old('email', $proveedor->email) }}"
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
                value="{{ old('rut', $proveedor->rut) }}"
                required
            >
        </div>

        <div class="campo">

            <label for="codigo_postal">
                Código postal
            </label>

            <input
                type="text"
                id="codigo_postal"
                name="codigo_postal"
                value="{{ old('codigo_postal', $proveedor->codigo_postal) }}"
                required
            >

        </div>

         <div class="campo">

            <label for="direccion">
                Dirección
            </label>

            <input
                type="text"
                id="direccion"
                name="direccion"
                value="{{ old('direccion', $proveedor->direccion) }}"
                required
            >

        </div>

        <button type="submit">Actualizar</button>

    </form>
