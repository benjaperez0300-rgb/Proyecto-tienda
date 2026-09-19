<!DOCTYPE html>

<html lang="es">

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

    <p>Registrar un nuevo movimiento</p>

    <form action="{{ route('movimiento_inventario.store') }}" method="post">

        @csrf

        <div class="campo">

            <label for="productos_variantes_id">
                Variante del producto
            </label>

            <select
                name="productos_variantes_id"
                id="productos_variantes_id"
                required
            >

                <option value="">
                    Seleccionar variante
                </option>

                @foreach ($productosVariantes as $variante)

                    <option
                        value="{{ $variante->id }}"
                        {{ old('productos_variantes_id') == $variante->id ? 'selected' : '' }}
                    >

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

            <label for="cantidad">
                Cantidad
            </label>

            <input
                type="number"
                name="cantidad"
                id="cantidad"
                value="{{ old('cantidad') }}"
                required
            >

        </div>

        <div class="campo">

            <label for="tipo_movimiento">
                Tipo de Movimiento
            </label>

            <select
                name="tipo_movimiento"
                id="tipo_movimiento"
                required
            >

                <option value="">
                    Seleccionar tipo
                </option>

                <option
                    value="entrada"
                    {{ old('tipo_movimiento') == 'entrada' ? 'selected' : '' }}
                >
                    Entrada
                </option>

                <option
                    value="salida"
                    {{ old('tipo_movimiento') == 'salida' ? 'selected' : '' }}
                >
                    Salida
                </option>

            </select>

        </div>

        <div class="campo">

            <label for="fecha_movimiento">
                Fecha del Movimiento
            </label>

            <input
                type="date"
                name="fecha_movimiento"
                id="fecha_movimiento"
                value="{{ old('fecha_movimiento') }}"
                required
            >

        </div>

        <button type="submit">
            Registrar Movimiento
        </button>

    </form>

    <h2>Movimientos registrados</h2>

    @if ($movimientos->isEmpty())

        <p>No hay movimientos de inventario registrados.</p>

    @else

        <table>

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Variante</th>
                    <th>Cantidad</th>
                    <th>Tipo de Movimiento</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody>

                @foreach ($movimientos as $movimiento)

                    <tr>

                        <td>
                            {{ $movimiento->id }}
                        </td>

                        <td>

                            @if ($movimiento->productoVariante)

                                {{ $movimiento->productoVariante->producto->nombre }}
                                -
                                Talle: {{ $movimiento->productoVariante->talle->nombre }}
                                -
                                Color: {{ $movimiento->productoVariante->color->nombre }}

                            @else

                                Variante no disponible

                            @endif

                        </td>

                        <td>
                            {{ $movimiento->cantidad }}
                        </td>

                        <td>
                            {{ $movimiento->tipo_movimiento }}
                        </td>

                        <td>
                            {{ $movimiento->fecha_movimiento }}
                        </td>

                        <td>

                            <a href="{{ route('movimiento_inventario.edit', $movimiento->id) }}">
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
