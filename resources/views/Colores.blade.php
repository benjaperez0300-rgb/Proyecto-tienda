<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colores</title>
</head>
<body>
<h1>Colores</h1>

    <form action="/colores" method="POST">
        @csrf

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <br>
        <br>

        <label for="codigo_hex">Código HEX:</label>
        <input type="text" id="codigo_hex" name="codigo_hex" required pattern="#[0-9A-Fa-f]{6}">

        <button type="submit">Guardar</button>
    </form>

    <h2>Colores registrados</h2>

    <ul>
        @foreach ($colores as $color)
            <li>
                {{ $color->id_color }} - {{ $color->nombre }} - {{ $color->codigo_hex }}
            </li>
        @endforeach
    </ul>
</body>
</html>