<!DOCTYPE HTML>
<html lang="en">    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Talles</title>
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>
    <body>
        <main class="contenedor">
            <h1>Talles</h1>
            <form action="/talles" method="POST">
                @csrf
                <div class="campo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <button type="submit">Guardar</button>
            </form>
            <h2>Talles registrados</h2>
            @if ($talles->isEmpty())
                <p>No hay talles registrados.</p>
            @else
                <ul>
                    @foreach ($talles as $talle)
                        <li>{{ $talle->nombre }}</li>
                    @endforeach
                </ul>
            @endif
        </main>
    </body>
</html>