<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Detalles de Compras</title>
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

    <p>Registrar un nuevo detalle de compra</p>

    <form action="{{ route('detalle_compras.store') }}" method="post">

        @csrf

        <div class="campo">
            <label for="compras_id">Compra</label>

            <select name="compras_id" id="compras_id" required>
                <option value="">Seleccionar compra</option>

                @foreach ($compras as $compra)
                    <option value="{{ $compra->id }}"
                        {{ old('compras_id') == $compra->id ? 'selected' : '' }}>
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
                        {{ old('producto_variante_id') == $variante->id ? 'selected' : '' }}>
                        {{ $variante->producto->nombre }}
                        - Talle: {{ $variante->talle->nombre }}
                        - Color: {{ $variante->color->nombre }}
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
                value="{{ old('cantidad') }}"
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
                value="{{ old('precio') }}"
                step="0.01"
                min="0"
                required
            >
        </div>

        <button type="submit">
            Guardar Detalle de Compra
        </button>

    </form>

    <h2>Detalles de Compras Registrados</h2>

    @if ($detalleCompras->isEmpty())

        <p>No hay detalles de compras registrados.</p>

    @else

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Compra</th>
                    <th>Variante</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($detalleCompras as $detalle)

                    <tr>
                        <td>{{ $detalle->id }}</td>

                        <td>
                            Compra #{{ $detalle->compras_id }}
                        </td>

                        <td>
                            @if ($detalle->productoVariante)
                                {{ $detalle->productoVariante->producto->nombre }}
                                -
                                Talle: {{ $detalle->productoVariante->talle->nombre }}
                                -
                                Color: {{ $detalle->productoVariante->color->nombre }}
                            @else
                                Variante no disponible
                            @endif
                        </td>

                        <td>
                            {{ $detalle->cantidad }}
                        </td>

                        <td>
                            {{ $detalle->precio }}
                        </td>

                        <td>
                            <a href="{{ route('detalle_compras.edit', $detalle->id) }}">
                                Editar
                            </a>
                        </td>
                    </tr>

                @endforeach

            </tbody>

        </table>

    @endif

</main>


</body>

</html>
