<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <title>Registro de Pedidos</title>
</head>

<body>

    <main class="contenedor">

        <h1>Registro de Pedidos</h1>

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


        <form action="{{ route('pedidos.store') }}" method="POST">

            @csrf

            <div class="campo">

                <label for="usuarios_id">
                    ID del cliente:
                </label>

                <select name="usuarios_id" id="usuarios_id" required>

                    <option value="">
                        Selecciona un usuario
                    </option>

                    @foreach ($usuarios as $usuario)

                        <option value="{{ $usuario->id }}">
                            {{ $usuario->nombre }} {{ $usuario->apellido }}
                        </option>

                    @endforeach

                </select>

            </div>


            <div class="campo">

                <label for="productos_id">
                    ID del producto:
                </label>

                <select name="productos_id" id="productos_id" required>

                    <option value="">
                        Selecciona un producto
                    </option>

                    @foreach ($productos as $producto)

                        <option value="{{ $producto->id }}">
                            {{ $producto->nombre }}
                        </option>

                    @endforeach

                </select>

            </div>


            <div class="campo">

                <label for="estados_pedidos_id">
                    Estado del Pedido:
                </label>

                <select
                    name="estados_pedidos_id"
                    id="estados_pedidos_id"
                    required
                >

                    <option value="">
                        Selecciona un estado
                    </option>

                    @foreach ($estados_pedidos as $estado)

                        <option value="{{ $estado->id }}">
                            {{ $estado->nombre }}
                        </option>

                    @endforeach

                </select>

            </div>


            <div class="campo">

                <label for="fecha_pedido">
                    Fecha del pedido:
                </label>

                <input
                    type="date"
                    name="fecha_pedido"
                    id="fecha_pedido"
                    required
                >

            </div>


            <div class="campo">

                <label for="fecha_envio">
                    Fecha del envío:
                </label>

                <input
                    type="date"
                    name="fecha_envio"
                    id="fecha_envio"
                >

            </div>


            <div class="campo">

                <label for="subtotal">
                    Subtotal:
                </label>

                <input
                    type="number"
                    name="subtotal"
                    id="subtotal"
                    step="0.01"
                    required
                >

            </div>


            <div class="campo">

                <label for="total">
                    Total:
                </label>

                <input
                    type="number"
                    name="total"
                    id="total"
                    step="0.01"
                    required
                >

            </div>


            <button type="submit">
                Registrar Pedido
            </button>

        </form>


        <h2>Lista de Pedidos</h2>


        @if ($pedidos->isEmpty())

            <p>
                No hay pedidos registrados.
            </p>

        @else

            <table>

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Producto</th>
                        <th>Estado</th>
                        <th>Fecha del pedido</th>
                        <th>Fecha del envío</th>
                        <th>Subtotal</th>
                        <th>Total</th>
                        <th>Acciones</th>

                    </tr>

                </thead>


                <tbody>

                    @foreach ($pedidos as $pedido)

                        <tr>

                            <td>
                                {{ $pedido->id }}
                            </td>

                            <td>
                                {{ $pedido->usuario->nombre }}
                                {{ $pedido->usuario->apellido }}
                            </td>

                            <td>
                                {{ $pedido->producto->nombre }}
                            </td>

                            <td>
                                {{ $pedido->estadosPedido->nombre }}
                            </td>

                            <td>
                                {{ $pedido->fecha_pedido }}
                            </td>

                            <td>
                                {{ $pedido->fecha_envio ?? 'Sin enviar' }}
                            </td>

                            <td>
                                ${{ number_format($pedido->subtotal, 2, ',', '.') }}
                            </td>

                            <td>
                                ${{ number_format($pedido->total, 2, ',', '.') }}
                            </td>

                            <td>

                                <a href="{{ route('pedidos.edit', $pedido->id) }}">
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