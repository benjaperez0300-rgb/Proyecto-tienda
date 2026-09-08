<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Editar Movimiento de Inventario</title>
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
        <form action="{{ route('movimiento_inventario.update', $movimiento->id) }}" method="post">
            @csrf
            @method('PUT')
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
            <button type="submit">Editar Movimiento</button>
        </form>
        <a href="{{ route('movimiento_inventario.index') }}">Cancelar</a>
    </main>
</body>
</html>