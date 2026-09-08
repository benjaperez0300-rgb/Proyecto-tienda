<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Editar Factura</title>
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
        <h1>Editar Factura</h1>
        <form action="{{ route('facturas.update', $factura->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="campo">
                <label for="pedidos_id">ID del pedido:</label>
                <select type="number" name="pedidos_id" id="pedidos_id" required>
                    <option value="">Selecciona un pedido</option>
                    @foreach ($pedidos as $pedido)
                        <option value="{{ $pedido->id }}" {{ $factura->pedidos_id == $pedido->id ? 'selected' : '' }}>
                            {{ $pedido->id }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="campo">
                <label for="fecha_factura">Fecha:</label>
                <input type="date" name="fecha_factura" id="fecha_factura" value="{{ $factura->fecha_factura }}" required>
            </div>
            <div class="campo">
                <label for="numero_factura">Número de factura:</label>
                <input type="text" name="numero_factura" id="numero_factura" value="{{ $factura->numero_factura }}" required>
            </div>
            <div class="campo">
                <label for="subtotal">Subtotal:</label>
                <input type="number" name="subtotal" id="subtotal" step="0.01" value="{{ $factura->subtotal }}" required>
            </div>
            <div class="campo">
                <label for="impuestos">Impuestos:</label>
                <input type="number" name="impuestos" id="impuestos" step="0.01" value="{{ $factura->impuestos }}" required>
            </div>
            <div class="campo">
                <label for="total">Total:</label>
                <input type="number" name="total" id="total" step="0.01" value="{{ $factura->total }}" required>
            </div>
            <button type="submit">Actualizar Factura</button>
        </form>
    </main>
</body>
</html>