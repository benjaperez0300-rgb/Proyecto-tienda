<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar variantes de los productos</title>
</head>
<body>
    <main class="contenedor">
        <h1>Editar variante de producto</h1>
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

        <form action="{{ route('admin.productosVariantes.update', $variante->id_variante) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="campo">
                <label for="productos_id">Producto:</label>
                <select name="productos_id" id="productos_id" required>
                    <option value="">Seleccione un producto</option>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id_producto }}" {{ $variante->productos_id == $producto->id_producto ? 'selected' : '' }}>{{ $producto->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="campo">
                <label for="talles_id">Talle:</label>
                <select name="talles_id" id="talles_id" required>
                    <option value="">Seleccione un talle</option>
                    @foreach($talles as $talle)
                        <option value="{{ $talle->id_talle }}" {{ $variante->talles_id == $talle->id_talle ? 'selected' : '' }}>{{ $talle->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="campo">
                  <label for="colores_id">Color:</label>
                <select name="colores_id" id="colores_id" required>
                    <option value="">Seleccione un color</option>
                    @foreach($colores as $color)
                        <option value="{{ $color->id_color }}" {{ $variante->colores_id == $color->id_color ? 'selected' : '' }}>{{ $color->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="campo">
                <label for="stock">Stock:</label>
                <input type="number" name="stock" id="stock" min="0" value="{{ $variante->stock }}" required>
            </div>
            <button type="submit">Actualizar</button>
        </form>
    </main>
</body>
</html>