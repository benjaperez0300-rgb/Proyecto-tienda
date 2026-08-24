<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colores</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<main class="contenedor">

   <h1>Colores</h1>

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

    <form action="/colores" method="POST">
        @csrf

        <div class="campo">

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        </div>

        <br>
        <br>

        <div class="campo">

        <label for="codigo_hex">Código HEX:</label>
        <input type="text" id="codigo_hex" name="codigo_hex" required pattern="#[0-9A-Fa-f]{6}">

        </div>

        <button type="submit">Guardar</button>
    </form>

    <h2>Colores registrados</h2>

    @if ($colores->isEmpty())
        <p>No hay colores registrados.</p>
    @else
        <ul>
            @foreach ($colores as $color)
                <li>
                    {{ $color->id_color }} - {{ $color->nombre }} - {{ $color->codigo_hex }}
                </li>
            @endforeach
        </ul>
    @endif
</main>
</body>
</html>