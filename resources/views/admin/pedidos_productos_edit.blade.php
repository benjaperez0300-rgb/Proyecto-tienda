<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Editar Productos en el Pedido</title>
</head>
<body>
     <main class="contenedor">
        <h1>Pedidos de Productos</h1>
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
        <form action="{{ route('pedidos_productos.update', $pedido_producto->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="campo">
                <label for="pedido_id">ID del pedido:</label>
                <select name="pedido_id" id="pedido_id" required>
                    <option value="">Selecciona un pedido</option>
                    @foreach ($pedidos as $pedido)
                        <option value="{{ $pedido->id }}" {{ $pedido_producto->pedido_id == $pedido->id ? 'selected' : '' }}>
                            {{ $pedido->id }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="campo">
                <label for="producto_variantes_id">ID del producto:</label>
                <select name="producto_variantes_id" id="producto_variantes_id" required>
                    <option value="">Selecciona un producto</option>
                    @foreach ($productos_variantes as $producto)
                        <option value="{{ $producto->id }}" {{ $pedido_producto->producto_variantes_id == $producto->id ? 'selected' : '' }}>
                            {{ $producto->id }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="campo">
                <label for="cantidad">Cantidad:</label>
                <input type="number" name="cantidad" id="cantidad" required>
            </div>
            <div class="campo">
                <label for="precio">Precio:</label>
                <input type="number" name="precio" id="precio" step="0.01" required>
            </div>
            <button type="submit">Agregar Producto al Pedido</button>
        </form>
        <a href="{{ route('pedidos_productos.index') }}">cancelar</a>
</body>
</html>