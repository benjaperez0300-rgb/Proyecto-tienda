<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <link
        rel="stylesheet"
        href="{{ asset('css/styles.css') }}"
    >

    <title>Registrar productos de los proveedores</title>

</head>

<body>

    <main class="contenedor">

        <h1>
            Registrar productos de los proveedores
        </h1>


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


        <form
            action="{{ route('productos_proveedor.store') }}"
            method="POST"
        >

            @csrf


            <!-- PRODUCTO -->

            <div class="campo">

                <label for="productos_id">
                    Producto:
                </label>

                <select
                    name="productos_id"
                    id="productos_id"
                    required
                >

                    <option value="">
                        Seleccione un producto
                    </option>

                    @foreach ($productos as $producto)

                        <option
                            value="{{ $producto->id }}"
                            {{ old('productos_id') == $producto->id ? 'selected' : '' }}
                        >

                            {{ $producto->nombre }}

                        </option>

                    @endforeach

                </select>

            </div>


            <!-- PROVEEDOR -->

            <div class="campo">

                <label for="proveedores_id">
                    Proveedor:
                </label>

                <select
                    name="proveedores_id"
                    id="proveedores_id"
                    required
                >

                    <option value="">
                        Seleccione un proveedor
                    </option>

                    @foreach ($proveedores as $proveedor)

                        <option
                            value="{{ $proveedor->id }}"
                            {{ old('proveedores_id') == $proveedor->id ? 'selected' : '' }}
                        >

                            {{ $proveedor->nombre_empresa }}

                        </option>

                    @endforeach

                </select>

            </div>


            <button type="submit">
                Registrar
            </button>

        </form>


        <h2>
            Productos de Proveedores
        </h2>


        @if ($productosProveedor->isEmpty())

            <p>
                No hay productos de proveedores registrados.
            </p>

        @else

            <table>

                <thead>

                    <tr>

                        <th>
                            Producto
                        </th>

                        <th>
                            Proveedor
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @foreach ($productosProveedor as $item)

                        <tr>

                            <td>
                                {{ $item->producto->nombre }}
                            </td>

                            <td>
                                {{ $item->proveedor->nombre_empresa }}
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        @endif

    </main>

</body>

</html>
