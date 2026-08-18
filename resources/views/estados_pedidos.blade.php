<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estados de pedidos</title>
</head>

<body>

    <h1>Estados de pedidos</h1>

    <form action="/estados-pedidos" method="POST">

        @csrf

        <label for="nombre">Nombre del estado:</label>

        <input
            type="text"
            id="nombre"
            name="nombre"
            required
        >

        <button type="submit">Guardar</button>

    </form>

    <h2>Estados registrados</h2>

    <ul>
        @foreach ($estados as $estado)
            <li>
                {{ $estado->id }} - {{ $estado->nombre }}
            </li>
        @endforeach
    </ul>

</body>
</html>