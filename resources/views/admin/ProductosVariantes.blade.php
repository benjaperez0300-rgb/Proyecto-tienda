<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variantes de productos</title>
     <link
        rel="stylesheet"
        href="{{ asset('css/styles.css') }}"
    >
</head>
<body>
    <main class="contenedor">
        <h1>Variantes de productos</h1>
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
    <h2>Registrar variante de producto</h2>
    <form action="{{ route('admin.productosVariantes.store') }}" method="POST">
            @csrf
            <div class="campo">
                <label for="productos_id">Producto:</label>
                <select name="productos_id" id="productos_id" required>
                    <option value="">Seleccione un producto</option>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id_producto }}">{{ $producto->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="campo">
                <label for="talles_id">Talle:</label>
                <select name="talles_id" id="talles_id" required>
                    <option value="">Seleccione un talle</option>
                    @foreach($talles as $talle)
                        <option value="{{ $talle->id_talle }}">{{ $talle->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="campo">
                  <label for="colores_id">Color:</label>
                <select name="colores_id" id="colores_id" required>
                    <option value="">Seleccione un color</option>
                    @foreach($colores as $color)
                        <option value="{{ $color->id_color }}">{{ $color->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="campo">
                <label for="stock">Stock:</label>
                <input type="number" name="stock" id="stock" min="0" required>
            </div>
            <button type="submit">Registrar</button>
        </form>

        <h2>Variantes de productos registradas</h2>
        @if($productosVariantes->isEmpty())
            <p>No hay variantes de productos registradas.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Talle</th>
                        <th>Color</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productosVariantes as $variante)
                        <tr>
                            <td>{{ $variante->producto->nombre }}</td>
                            <td>{{ $variante->talle->nombre }}</td>
                            <td>{{ $variante->color->nombre }}</td>
                            <td>{{ $variante->stock }}</td>
                            <td>
                                <a href="{{ route('admin.productosVariantes.edit', 
                                $variante->id_producto_variante) }}" class="btn btn-primary">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
  </main>  
</body>
</html>