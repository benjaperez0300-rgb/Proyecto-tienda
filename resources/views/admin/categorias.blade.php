<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Categorías</title>

    <link
        rel="stylesheet"
        href="{{ asset('css/styles.css') }}"
    >
</head>

<body>

<main class="contenedor">

    <h1>Categorías</h1>

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


    <h2>Registrar categoría</h2>

    <form
        action="{{ route('categorias.store') }}"
        method="POST"
    >

        @csrf

        <div class="campo">

            <label for="nombre">
                Nombre
            </label>

            <input
                type="text"
                id="nombre"
                name="nombre"
                value="{{ old('nombre') }}"
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
            >{{ old('descripcion') }}</textarea>

        </div>


        <button type="submit">
            Guardar categoría
        </button>

    </form>


    <h2>Categorías registradas</h2>

    @if ($categorias->isEmpty())

        <p>
            No hay categorías registradas.
        </p>

    @else

        <table>

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody>

                @foreach ($categorias as $categoria)

                    <tr>

                        <td>
                            {{ $categoria->id }}
                        </td>

                        <td>
                            {{ $categoria->nombre }}
                        </td>

                        <td>
                            {{ $categoria->descripcion }}
                        </td>

                        <td>

                            <a
                                href="{{ route('categorias.edit', $categoria->id) }}"
                            >
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