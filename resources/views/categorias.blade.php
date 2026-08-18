<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
</head>
<body>
    
    <h1>Categorías</h1>

    <form action="/categorias" method="POST">

        @csrf

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <br>
        <br>

        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" required>

        <button type="submit">Guardar</button>

    </form>

    <h2>Categorías registradas</h2>

    <ul>
        @foreach ($categorias as $categoria)
            <li>
                {{ $categoria->id_categoria }} - {{ $categoria->nombre }} - {{ $categoria->descripcion }}
            </li>
        @endforeach
    </ul>
</body>
</html>