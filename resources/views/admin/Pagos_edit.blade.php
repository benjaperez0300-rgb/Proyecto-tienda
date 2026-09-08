<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Editar Pago</title>
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
        <h1>Editar Pago</h1>
        <form action="{{ route('pagos.update', $pago->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="campo">
                <label for="pedidos_id">ID del pedido:</label>
                <select type="number" name="pedidos_id" id="pedidos_id" required>
                    <option value="">Selecciona un pedido</option>
                    @foreach ($pedidos as $pedido)
                        <option value="{{ $pedido->id }}" {{ $pago->pedidos_id == $pedido->id ? 'selected' : '' }}>
                            {{ $pedido->id }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="campo">
                <label for="metodo_pago_id">Método de pago:</label>
                <select name="metodo_pago_id" id="metodo_pago_id" required>
                    <option value="">Selecciona un método</option>
                    @foreach ($metodosPago as $metodo)
                        <option value="{{ $metodo->id }}" {{ $pago->metodo_pago_id == $metodo->id ? 'selected' : '' }}>
                            {{ $metodo->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="campo">
                <label for="monto">Monto:</label>
                <input type="number" name="monto" id="monto" step="0.01" value="{{ $pago->monto }}" required>
            </div>
            <div class="campo">
                <label for="numero_cuota">Número de cuota:</label>
                <input type="number" name="numero_cuota" id="numero_cuota" value="{{ $pago->numero_cuota }}" required>
            </div>
            <div class="campo">
                <label for="fecha_pago">Fecha del pago:</label>
                <input type="date" name="fecha_pago" id="fecha_pago" value="{{ $pago->fecha_pago }}" required>
            </div>
            <button type="submit">Actualizar Pago</button>
        </form>
    </main>
</body>
</html>