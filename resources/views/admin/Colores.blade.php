<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <link
        rel="stylesheet"
        href="{{ asset('css/pagina.css') }}"
    >

    <title>Colores</title>

</head>

<body>

    <main class="contenedor">

        <h1>
            Colores
        </h1>


        @if (session('mensaje'))

            <div class="mensaje mensaje-exito">

                {{ session('mensaje') }}

            </div>

        @endif


        @if ($errors->any())

            <div class="mensaje mensaje-error">

                <p>
                    Revisa los siguientes campos:
                </p>

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form
            action="{{ route('colores.store') }}"
            method="POST"
        >

            @csrf

            <div class="campo">

                <label for="nombre">
                    Nombre:
                </label>

                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    value="{{ old('nombre') }}"
                    required
                >

            </div>


            <button type="submit">
                Guardar
            </button>

        </form>


        <h2>
            Colores registrados
        </h2>


        @if ($colores->isEmpty())

            <p>
                No hay colores registrados.
            </p>

        @else

            <ul>

                @foreach ($colores as $color)

                    <li>
                        {{ $color->id }} -
                        {{ $color->nombre }}
                    </li>

                @endforeach

            </ul>

        @endif

    </main>

</body>

</html>

