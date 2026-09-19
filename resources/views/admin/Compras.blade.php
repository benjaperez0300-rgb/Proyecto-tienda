<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Compras</title>
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

    <h1>Compras</h1>

    <p>Registrar una nueva compra</p>

    <form action="{{ route('compras.store') }}" method="post">

        @csrf

        <div class="campo">
            <label for="proveedor_id">Proveedor</label>

            <select name="proveedor_id" id="proveedor_id" required>
                <option value="">Seleccionar proveedor</option>

                @foreach ($proveedores as $proveedor)
                    <option value="{{ $proveedor->id }}"
                        {{ old('proveedor_id') == $proveedor->id ? 'selected' : '' }}>
                        {{ $proveedor->nombre_empresa }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="campo">
            <label for="producto_id">Producto</label>

            <select name="producto_id" id="producto_id" required>
                <option value="">Seleccionar producto</option>

                @foreach ($productos as $producto)
                    <option value="{{ $producto->id }}"
                        {{ old('producto_id') == $producto->id ? 'selected' : '' }}>
                        {{ $producto->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="campo">
            <label for="fecha">Fecha</label>

            <input
                type="date"
                name="fecha"
                id="fecha"
                value="{{ old('fecha') }}"
                required
            >
        </div>

        <div class="campo">
            <label for="total">Total</label>

            <input
                type="number"
                name="total"
                id="total"
                value="{{ old('total') }}"
                step="0.01"
                min="0"
                required
            >
        </div>

        <button type="submit">Crear Compra</button>

    </form>

    <h2>Compras registradas</h2>

    @if ($compras->isEmpty())

        <p>No hay compras registradas.</p>

    @else

        <ul>

            @foreach ($compras as $compra)

                <li>
                    {{ $compra->id }}
                    -
                    {{ $compra->proveedor->nombre_empresa }}
                    -
                    {{ $compra->producto->nombre }}
                    -
                    {{ $compra->fecha }}
                    -
                    {{ $compra->total }}

                    <a href="{{ route('compras.edit', $compra->id) }}">
                        Editar
                    </a>
                </li>

            @endforeach

        </ul>

    @endif

</main>


</body>

</html>
