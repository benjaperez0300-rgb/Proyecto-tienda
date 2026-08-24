<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcas</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <main class="contenedor">

       
        <h1>Marcas</h1>
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

        <form action="/marcas" method="POST">
            @csrf

            <div class="campo">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <button type="submit">Guardar</button>
        </form>

        <h2>Marcas registradas</h2>

        @if ($marcas->isEmpty())
            <p>No hay marcas registradas.</p>
        @else
            <ul>
                @foreach ($marcas as $marca)
                    <li>{{ $marca->nombre }}</li>
                @endforeach
            </ul>
        @endif
    </main>
</body>
</html>