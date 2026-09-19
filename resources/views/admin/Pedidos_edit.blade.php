<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <title>Editar Pedido</title>

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

                <p>
                    Revisa los siguientes campos:
                </p>

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <h1>
            Editar Pedido
        </h1>


        <form
            action="{{ route('pedidos.update', $pedido->id) }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            <div class="campo">

                <label for="usuarios_id">
                    ID del cliente:
                </label>

                <select
                    name="usuarios_id"
                    id="usuarios_id"
                    required
                >

                    <option value="">
                        Selecciona un usuario
                    </option>

                    @foreach ($usuarios as $usuario)

                        <option
                            value="{{ $usuario->id }}"
                            {{ $pedido->usuarios_id == $usuario->id ? 'selected' : '' }}
                        >
                            {{ $usuario->nombre }}
                            {{ $usuario->apellido }}
                        </option>

                    @endforeach

                </select>

            </div>


            <div class="campo">

                <label for="productos_id">
                    ID del producto:
                </label>

                <select
                    name="productos_id"
                    id="productos_id"
                    required
                >

                    <option value="">
                        Selecciona un producto
                    </option>

                    @foreach ($productos as $producto)

                        <option
                            value="{{ $producto->id }}"
                            {{ $pedido->productos_id == $producto->id ? 'selected' : '' }}
                        >
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

                        <option
                            value="{{ $estado->id }}"
                            {{ $pedido->estados_pedidos_id == $estado->id ? 'selected' : '' }}
                        >
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
                    value="{{ $pedido->fecha_pedido }}"
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
                    value="{{ $pedido->fecha_envio }}"
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
                    value="{{ $pedido->subtotal }}"
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
                    value="{{ $pedido->total }}"
                    required
                >

            </div>


            <div class="campo">

                <button
                    type="submit"
                    class="boton"
                >
                    Actualizar Pedido
                </button>

            </div>

        </form>

    </main>

</body>
</html>