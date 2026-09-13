<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/pagina.css') }}">
    <title>Perfil</title>
</head>
<body>
    <main class="contenedor">
        <h1>Perfil de Usuario</h1>
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
       <h2>Información del Perfil</h2>
        <p><strong>Nombre:</strong> {{ $usuario->nombre }}</p>
        <p><strong>Email:</strong> {{ $usuario->email }}</p>
        <p><strong>Dirección:</strong> {{ $usuario->direccion }}</p>
        <p><strong>Teléfono:</strong> {{ $usuario->telefono }}</p>

        <a href="{{ route('perfil.edit', $usuario->id) }}">Editar Perfil</a>

        <h2>Historial de compras</h2>
        @if ($pedidos->isEmpty())
            <p>No has realizado ninguna compra aún.</p>
        @else
            <ul>
                @foreach ($pedidos as $pedido)
                    <li>
                        <strong>Orden #{{ $pedido->id }}</strong> - {{ $pedido->created_at->format('d/m/Y') }}
                        <br>
                        Total: ${{ number_format($pedido->total, 2) }}
                    </li>
                @endforeach
            </ul>
        @endif
    </main>
</body>
</html>