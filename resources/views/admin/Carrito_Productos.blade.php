<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Detalle de Compras</title>
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
        <h1>Detalle de Compras</h1>
        <form action="{{ route('carrito_productos.store') }}" method="post">
            @csrf
            <div class="campo">
                <label for="carrito_id">ID del carrito:</label>
                <select name="carrito_id" id="carrito_id" required>
                    <option value="">Selecciona un carrito</option>
                    @foreach ($carritos as $carrito)
                        <option value="{{ $carrito->id }}">{{ $carrito->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="campo">
                <label for="producto_id">ID del producto:</label>
                <select name="producto_id" id="producto_id" required>
                    <option value="">Selecciona un producto</option>
                    @foreach ($productos as $producto)
                        <option value="{{ $producto->id }}">{{ $producto->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="campo">
                <label for="cantidad">Cantidad:</label>
                <input type="number" name="cantidad" id="cantidad" required>
            </div>
            <button type="submit">Agregar al carrito</button>
        </form>
        <h2>Lista de productos en el carrito</h2>
        @if ($carritoProductos->isEmpty())
            <p>No hay productos en el carrito.</p>
        @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID del carrito</th>
                    <th>ID del producto</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carritoProductos as $carritoProducto)
                    <tr>
                        <td>{{ $carritoProducto->id }}</td>
                        <td>{{ $carritoProducto->carrito_id }}</td>
                        <td>{{ $carritoProducto->producto_id }}</td>
                        <td>{{ $carritoProducto->cantidad }}</td>
                        <td>
                            <a href="{{ route('carrito_productos.edit', $carritoProducto->id) }}">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </main>
</body>
</html>