<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Facturas</title>
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
        <h1>Facturas</h1>
        <form action="{{ route('facturas.store') }}" method="post">
            @csrf
            <div class="campo">
                <label for="pedidos_id">ID del pedido:</label>
                <select type="number" name="pedidos_id" id="pedidos_id" required>
                    <option value="">Selecciona un pedido</option>
                    @foreach ($pedidos as $pedido)
                        <option value="{{ $pedido->id }}">{{ $pedido->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="campo">
                <label for="fecha_factura">Fecha:</label>
                <input type="date" name="fecha_factura" id="fecha_factura" required>
            </div>
            <div class="campo">
                <label for="numero_factura">Número de factura:</label>
                <input type="text" name="numero_factura" id="numero_factura" required>
            </div>
            <div class="campo">
                <label for="subtotal">Subtotal:</label>
                <input type="number" name="subtotal" id="subtotal" step="0.01" required>
            </div>
            <div class="campo">
                <label for="impuestos">Impuestos:</label>
                <input type="number" name="impuestos" id="impuestos" step="0.01" required>
            </div>
            <div class="campo">
                <label for="total">Total:</label>
                <input type="number" name="total" id="total" step="0.01" required>
            </div>
            <button type="submit">Registrar Factura</button>
        </form>
        <h2>Lista de Facturas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pedido</th>
                    <th>Fecha</th>
                    <th>Número</th>
                    <th>Subtotal</th>
                    <th>Impuestos</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($facturas as $factura)
                    <tr>
                        <td>{{ $factura->id }}</td>
                        <td>{{ $factura->pedidos_id }}</td>
                        <td>{{ $factura->fecha_factura }}</td>
                        <td>{{ $factura->numero_factura }}</td>
                        <td>{{ $factura->subtotal }}</td>
                        <td>{{ $factura->impuestos }}</td>
                        <td>{{ $factura->total }}</td>
                        <td>
                            <a href="{{ route('facturas.edit', $factura->id) }}">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>
</html>