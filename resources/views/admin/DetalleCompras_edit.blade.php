<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Editar Detalle de Compras</title>
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
        <h1>Detalles de Compras</h1>
        <p>Lista de detalles de compras...</p>
        <form action="{{ route('detalle_compras.update', $detalle->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="campo">
                <label for="compra_id">ID de la compra:</label>
                <select name="compra_id" id="compra_id" required>
                    <option value="">Selecciona una compra</option>
                    @foreach ($compras as $compra)
                        <option value="{{ $compra->id }}">{{ $compra->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="campo">
                <label for="producto_variantes_id">ID del producto:</label>
                <select name="producto_variantes_id" id="producto_variantes_id" required>
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
            <div class="campo">
                <label for="precio">Precio:</label>
                <input type="number" name="precio" id="precio" step="0.01" required>
            </div>
            <button type="submit">Editar Detalle de Compra</button>
        </form>
</body>
</html>