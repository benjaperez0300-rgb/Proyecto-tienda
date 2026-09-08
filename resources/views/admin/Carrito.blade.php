<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
</head>
<body>
    <main class="contenedor">
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
        <form action="{{ route('carrito.store') }}" method="post">
            @csrf
            <div class="campo">
                <label for="usuario_id">ID del usuario:</label>
                <input type="number" name="usuario_id" id="usuario_id" required>
            </div>
            <button type="submit">Crear Carrito</button>
        </form>
        <h1>Carrito</h1>
        <p>Lista de carritos</p>
        @if ($carritos->isEmpty())
            <p>No hay carritos disponibles.</p>
        @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID del usuario</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carritos as $carrito)
                    <tr>
                        <td>{{ $carrito->id }}</td>
                        <td>{{ $carrito->usuario_id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </main>
</body>
</html>