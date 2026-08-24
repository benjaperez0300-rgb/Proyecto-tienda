<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Editar categoría</title>

    <link
        rel="stylesheet"
        href="{{ asset('css/styles.css') }}"
    >
</head>

<body>

<main class="contenedor">

    <h1>Editar categoría</h1>

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
        action="{{ route('categorias.update', $categoria->id) }}"
        method="POST"
    >

        @csrf

        @method('PUT')


        <div class="campo">

            <label for="nombre">
                Nombre
            </label>

            <input
                type="text"
                id="nombre"
                name="nombre"
                value="{{ old('nombre', $categoria->nombre) }}"
                maxlength="100"
                required
            >

        </div>


        <div class="campo">

            <label for="descripcion">
                Descripción
            </label>

            <textarea
                id="descripcion"
                name="descripcion"
                rows="4"
                maxlength="255"
            >{{ old('descripcion', $categoria->descripcion) }}</textarea>

        </div>


        <button type="submit">
            Guardar cambios
        </button>


        <a href="{{ route('categorias.index') }}">
            Cancelar
        </a>

    </form>

</main>

</body>
</html>