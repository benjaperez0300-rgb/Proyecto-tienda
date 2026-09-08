<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Pagos</title>
</head>
<body>
    <main class="contenedor">
        <h1>Pagos</h1>
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
        <form action="{{ route('pagos.store') }}" method="post">
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
                <label for="metodo_pago">Método de pago:</label>
                <select name="metodo_pago_id" id="metodo_pago_id" required>
                    <option value="">Selecciona un método</option>
                    @foreach ($metodosPago as $metodo)
                        <option value="{{ $metodo->id }}">{{ $metodo->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="campo">
                <label for="monto">Monto:</label>
                <input type="number" name="monto" id="monto" step="0.01" required>
            </div>
            <div class="campo">
                <label for="numero_cuota">Número de cuota:</label>
                <input type="number" name="numero_cuota" id="numero_cuota" required>
            </div>
            <div class="campo">
                <label for="fecha_pago">Fecha del pago:</label>
                <input type="date" name="fecha_pago" id="fecha_pago" required>
            </div>
            <button type="submit">Registrar Pago</button>
        </form>
        <h2>Lista de Pagos</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID del pedido</th>
                    <th>Método de pago</th>
                    <th>Monto</th>
                    <th>Número de cuota</th>
                    <th>Fecha del pago</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pagos as $pago)
                    <tr>
                        <td>{{ $pago->id }}</td>
                        <td>{{ $pago->pedidos_id }}</td>
                        <td>{{ $pago->metodo_pago->nombre }}</td>
                        <td>{{ $pago->monto }}</td>
                        <td>{{ $pago->numero_cuota }}</td>
                        <td>{{ $pago->fecha_pago }}</td>
                        <td><a href="{{ route('pagos.edit', $pago->id) }}">Editar</a></td>
                    </tr>
                @endforeach
            </tbody>
    </main>
</body>
</html>