<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Compra</title>
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

        <h1>Editar Compra</h1>
        <p>Editar los detalles de la compra</p>
        <form action="{{ route('compras.update', $compra->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $compra->nombre) }}">
            </div>
            <div class="campo">
                <label for="proveedor_id">Proveedor</label>
                <select name="proveedor_id" id="proveedor_id">
                    <option value="">Seleccionar proveedor</option>
                    @foreach ($proveedores as $proveedor)
                        <option value="{{ $proveedor->id }}" {{ old('proveedor_id', $compra->proveedor_id) == $proveedor->id ? 'selected' : '' }}>
                            {{ $proveedor->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="campo">
                <label for="producto_id">Producto</label>
                <select name="producto_id" id="producto_id">
                    <option value="">Seleccionar producto</option>
                    @foreach ($productos as $producto)
                        <option value="{{ $producto->id }}" {{ old('producto_id') == $producto->id ? 'selected' : '' }}>
                            {{ $producto->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="campo">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fecha" value="{{ old('fecha') }}">
            </div>
            <div class="campo">
                <label for="total">Total</label>
                <input type="number" name="total" id="total" value="{{ old('total') }}" step="0.01">
            </div>
            <button type="submit">Editar Compra</button>
        </form>
</body>
</html>