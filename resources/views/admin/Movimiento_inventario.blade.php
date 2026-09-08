<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Movimientos de Inventario</title>
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
        <h1>Movimientos de Inventario</h1>
        <form action="{{ route('movimiento_inventario.store') }}" method="post">
            @csrf
            <div class="campo">
                <label for="producto_variantes_id">ID de la variante del producto:</label>
                <select name="productos_variantes_id" id="productos_variantes_id" required>
                    <option value="">Selecciona una variante</option>
                    @foreach ($productosVariantes as $variante)
                        <option value="{{ $variante->id }}">{{ $variante->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="campo">
                <label for="cantidad">Cantidad:</label>
                <input type="number" name="cantidad" id="cantidad" required>
            </div>
            <div class="campo">
                <label for="tipo_movimiento">Tipo de Movimiento:</label>
                <select name="tipo_movimiento" id="tipo_movimiento" required>
                    <option value="">Selecciona un tipo</option>
                    <option value="entrada">Entrada</option>
                    <option value="salida">Salida</option>
                </select>
            </div>
            <div class="campo">
                <label for="fecha_movimiento">Fecha del Movimiento:</label>
                <input type="date" name="fecha_movimiento" id="fecha_movimiento" required>
            </div>
            <button type="submit">Registrar Movimiento</button>
        </form>
        <h2>Lista de Movimientos de Inventario</h2>
        @if ($movimientosInventario->isEmpty())
            <p>No hay movimientos de inventario registrados.</p>
        @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID de la variante del producto</th>
                    <th>Cantidad</th>
                    <th>Tipo de Movimiento</th>
                    <th>Fecha del Movimiento</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movimientosInventario as $movimiento)
                <tr>
                    <td>{{ $movimiento->id }}</td>
                    <td>{{ $movimiento->productos_variantes_id }}</td>
                    <td>{{ $movimiento->cantidad }}</td>
                    <td>{{ $movimiento->tipo_movimiento }}</td>
                    <td>{{ $movimiento->fecha_movimiento }}</td>
                    <td><a href="{{ route('movimiento_inventario.edit', $movimiento->id) }}">Editar</a></td>
                </tr>
                @endforeach
            </tbody>
    
</body>
</html>