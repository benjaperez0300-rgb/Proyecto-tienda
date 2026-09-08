<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Editar Producto en el Carrito</title>
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
        <h1>Editar Producto en el Carrito</h1>
        <form action="{{ route('carrito_productos.update', $carritoProducto->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="campo">
            <label for="carrito_id">ID del carrito:</label>
            <input type="number" name="carrito_id" id="carrito_id" value="{{ $carritoProducto->carrito_id }}" required>
        </div>
        <div class="campo">
            <label for="producto_id">ID del producto:</label>
            <input type="number" name="producto_id" id="producto_id" value="{{ $carritoProducto->producto_id }}" required>
        </div>
        <div class="campo">
            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" id="cantidad" value="{{ $carritoProducto->cantidad }}" required>
        </div>
        <button type="submit">Actualizar</button>
    </form>
    <a href="{{ route('carrito_productos.index') }}">Cancelar</a>
</body>
</html>