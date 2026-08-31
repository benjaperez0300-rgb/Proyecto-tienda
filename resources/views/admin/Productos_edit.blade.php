<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar productos</title>
</head>
<body>
   <main class="contenedor">
        <h1>Editar producto</h1>
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

        <form action="{{ route('admin.productos.update', $producto->id_producto) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="campo">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="{{ $producto->nombre }}" required>
            </div>
            <div class="campo">
                <label for="codigo_barra">Código de Barra:</label>
                <input type="text" name="codigo_barra" id="codigo_barra" value="{{ $producto->codigo_barra }}" required>
            </div>
            <div class="campo">
                <label for="precio">Precio:</label>
                <input type="number" name="precio" id="precio" step="0.01" value="{{ $producto->precio }}" required>
            </div>
            <div class="campo">
                <label for="material">Material:</label>
                <input type="text" name="material" id="material" value="{{ $producto->material }}" required>
            </div>
            <div class="campo">
                <label for="genero">Género:</label>
                <input type="text" name="genero" id="genero" value="{{ $producto->genero }}" required>
            </div>
            <div class="campo">
                <label for="marcas_id">Marca:</label>
                <select name="marcas_id" id="marcas_id" required>
                    <option value="">Seleccione una marca</option>
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id_marca }}" {{ $producto->marcas_id == $marca->id_marca ? 'selected' : '' }}>{{ $marca->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="campo">
                <label for="categorias_id">Categoría:</label>
                <select name="categorias_id" id="categorias_id" required>
                    <option value="">Seleccione una categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id_categoria }}" {{ $producto->categorias_id == $categoria->id_categoria ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Actualizar</button>
        </form>
    </main>
</body>
</html>