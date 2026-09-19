<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Editar Detalle de Compra</title>
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

    <h1>Editar Detalle de Compra</h1>

    <p>Editar los detalles de la compra</p>

    <form action="{{ route('detalle_compras.update', $detalleCompra->id) }}" method="post">

        @csrf
        @method('PUT')

        <div class="campo">
            <label for="compras_id">Compra</label>

            <select name="compras_id" id="compras_id" required>

                <option value="">Seleccionar compra</option>

                @foreach ($compras as $compra)

                    <option value="{{ $compra->id }}"
                        {{ old('compras_id', $detalleCompra->compras_id) == $compra->id ? 'selected' : '' }}>
                        Compra #{{ $compra->id }}
                    </option>

                @endforeach

            </select>
        </div>

        <div class="campo">
            <label for="producto_variante_id">Variante del producto</label>

            <select name="producto_variante_id" id="producto_variante_id" required>

                <option value="">Seleccionar variante</option>

                @foreach ($productosVariantes as $variante)

                    <option value="{{ $variante->id }}"
                        {{ old('producto_variante_id', $detalleCompra->producto_variante_id) == $variante->id ? 'selected' : '' }}>

                        {{ $variante->producto->nombre }}
                        -
                        Talle: {{ $variante->talle->nombre }}
                        -
                        Color: {{ $variante->color->nombre }}

                    </option>

                @endforeach

            </select>
        </div>

        <div class="campo">
            <label for="cantidad">Cantidad</label>

            <input
                type="number"
                name="cantidad"
                id="cantidad"
                value="{{ old('cantidad', $detalleCompra->cantidad) }}"
                min="1"
                required
            >
        </div>

        <div class="campo">
            <label for="precio">Precio</label>

            <input
                type="number"
                name="precio"
                id="precio"
                value="{{ old('precio', $detalleCompra->precio) }}"
                step="0.01"
                min="0"
                required
            >
        </div>

        <button type="submit">
            Guardar Cambios
        </button>

    </form>

    <p>
        <a href="{{ route('detalle_compras.index') }}">
            Volver a detalles de compras
        </a>
    </p>

</main>


</body>

</html>
