<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <title>Registrar Producto</title>

</head>

<body>

<main class="contenedor">

    <h1>Registrar Producto</h1>


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


    <form action="{{ route('productos.store') }}" method="POST">

        @csrf


        <div class="campo">

            <label for="nombre">
                Nombre:
            </label>

            <input
                type="text"
                name="nombre"
                id="nombre"
                value="{{ old('nombre') }}"
                required
            >

        </div>


        <div class="campo">

            <label for="codigo_barra">
                Código de Barra:
            </label>

            <input
                type="text"
                name="codigo_barra"
                id="codigo_barra"
                value="{{ old('codigo_barra') }}"
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


        <div class="campo">

            <label for="material">
                Material:
            </label>

            <input
                type="text"
                name="material"
                id="material"
                value="{{ old('material') }}"
                required
            >

        </div>


        <div class="campo">

            <label for="genero">
                Género:
            </label>

            <input
                type="text"
                name="genero"
                id="genero"
                value="{{ old('genero') }}"
                required
            >

        </div>


        <div class="campo">

            <label for="marcas_id">
                Marca:
            </label>

            <select
                name="marcas_id"
                id="marcas_id"
                required
            >

                <option value="">
                    Seleccione una marca
                </option>

                @foreach ($marcas as $marca)

                    <option
                        value="{{ $marca->id }}"
                        {{ old('marcas_id') == $marca->id ? 'selected' : '' }}
                    >
                        {{ $marca->nombre }}
                    </option>

                @endforeach

            </select>

        </div>


        <div class="campo">

            <label for="categorias_id">
                Categoría:
            </label>

            <select
                name="categorias_id"
                id="categorias_id"
                required
            >

                <option value="">
                    Seleccione una categoría
                </option>

                @foreach ($categorias as $categoria)

                    <option
                        value="{{ $categoria->id }}"
                        {{ old('categorias_id') == $categoria->id ? 'selected' : '' }}
                    >
                        {{ $categoria->nombre }}
                    </option>

                @endforeach

            </select>

        </div>


        <button type="submit">
            Guardar Producto
        </button>

    </form>


    <h2>Lista de Productos</h2>


    @if ($productos->isEmpty())

        <p>
            No hay productos registrados.
        </p>

    @else

        <table>

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Código de Barra</th>
                    <th>Precio</th>
                    <th>Material</th>
                    <th>Género</th>
                    <th>Marca</th>
                    <th>Categoría</th>
                    <th>Acciones</th>

                </tr>

            </thead>


            <tbody>

                @foreach ($productos as $producto)

                    <tr>

                        <td>
                            {{ $producto->id }}
                        </td>

                        <td>
                            {{ $producto->nombre }}
                        </td>

                        <td>
                            {{ $producto->codigo_barra }}
                        </td>

                        <td>
                            {{ $producto->precio }}
                        </td>

                        <td>
                            {{ $producto->material }}
                        </td>

                        <td>
                            {{ $producto->genero }}
                        </td>

                        <td>
                            {{ $producto->marca->nombre ?? 'N/A' }}
                        </td>

                        <td>
                            {{ $producto->categoria->nombre ?? 'N/A' }}
                        </td>

                        <td>

                            <a href="{{ route('productos.edit', $producto->id) }}">
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
