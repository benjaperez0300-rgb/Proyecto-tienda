<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <title>Editar Producto</title>

</head>

<body>

<main class="contenedor">

    <h1>Editar Producto</h1>


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


    <form
        action="{{ route('admin.productos.update', $producto->id) }}"
        method="POST"
    >

        @csrf

        @method('PUT')


        <div class="campo">

            <label for="nombre">
                Nombre:
            </label>

            <input
                type="text"
                name="nombre"
                id="nombre"
                value="{{ old('nombre', $producto->nombre) }}"
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
                value="{{ old('codigo_barra', $producto->codigo_barra) }}"
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
                value="{{ old('precio', $producto->precio) }}"
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
                value="{{ old('material', $producto->material) }}"
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
                value="{{ old('genero', $producto->genero) }}"
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
                        {{ old('marcas_id', $producto->marcas_id) == $marca->id ? 'selected' : '' }}
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
                        {{ old('categorias_id', $producto->categorias_id) == $categoria->id ? 'selected' : '' }}
                    >
                        {{ $categoria->nombre }}
                    </option>

                @endforeach

            </select>

        </div>


        <button type="submit">
            Actualizar
        </button>

    </form>


    <br>

    <a href="{{ route('productos.index') }}">
        Volver
    </a>

</main>

</body>

</html>
