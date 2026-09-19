<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <title>Pedidos de Productos</title>
</head>

<body>

<main class="contenedor">

    <h1>Pedidos de Productos</h1>

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


    <form action="{{ route('pedidos_productos.store') }}" method="POST">

        @csrf

        <div class="campo">

            <label for="pedidos_id">
                Pedido:
            </label>

            <select name="pedidos_id" id="pedidos_id" required>

                <option value="">
                    Selecciona un pedido
                </option>

                @foreach ($pedidos as $pedido)

                    <option
                        value="{{ $pedido->id }}"
                        {{ old('pedidos_id') == $pedido->id ? 'selected' : '' }}
                    >
                        Pedido #{{ $pedido->id }}
                    </option>

                @endforeach

            </select>

        </div>


        <div class="campo">

            <label for="productos_variantes_id">
                Producto:
            </label>

            <select
                name="productos_variantes_id"
                id="productos_variantes_id"
                required
            >

                <option value="">
                    Selecciona un producto
                </option>

                @foreach ($productos_variantes as $variante)

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
                Cantidad:
            </label>

            <input
                type="number"
                name="cantidad"
                id="cantidad"
                min="1"
                value="{{ old('cantidad') }}"
                required
            >

        </div>


        <div class="campo">

            <label for="precio">
                Precio:
            </label>

            <input
                type="number"
                name="precio"
                id="precio"
                step="0.01"
                min="0"
                value="{{ old('precio') }}"
                required
            >

        </div>


        <button type="submit">
            Agregar Producto al Pedido
        </button>

    </form>


    <h2>Productos en los Pedidos</h2>


    @if ($pedidos_productos->isEmpty())

        <p>
            No hay productos registrados en los pedidos.
        </p>

    @else

        <ul>

            @foreach ($pedidos_productos as $pedidoProducto)

                <li>

                    Pedido #{{ $pedidoProducto->pedidos_id }}

                    -
                    {{ $pedidoProducto->variante->producto->nombre }}

                    -
                    Talle:
                    {{ $pedidoProducto->variante->talle->nombre }}

                    -
                    Color:
                    {{ $pedidoProducto->variante->color->nombre }}

                    -
                    Cantidad:
                    {{ $pedidoProducto->cantidad }}

                    -
                    Precio:
                    ${{ number_format($pedidoProducto->precio, 2) }}

                    <a href="{{ route('pedidos_productos.edit', $pedidoProducto->id) }}">
                        Editar
                    </a>

                </li>

            @endforeach

        </ul>

    @endif

</main>

</body>

</html>

