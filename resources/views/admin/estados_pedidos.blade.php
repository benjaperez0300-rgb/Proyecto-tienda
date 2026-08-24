<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estados de pedidos</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>

  <main class="contenedor">

    <h1>Estados de pedidos</h1>

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

    <form action="/estados-pedidos" method="POST">

        @csrf

        <div class="campo">

        <label for="nombre">Nombre del estado:</label>

        <input
            type="text"
            id="nombre"
            name="nombre"
            required
        >

        </div>

        <button type="submit">Guardar</button>

    </form>

    <h2>Estados registrados</h2>

    @if ($estados->isEmpty())
        <p>No hay estados registrados.</p>
    @else
        <ul>
            @foreach ($estados as $estado)
                <li>
                    {{ $estado->id }} - {{ $estado->nombre }}
                </li>
            @endforeach
        </ul>
    @endif
  </main>
</body>
</html>