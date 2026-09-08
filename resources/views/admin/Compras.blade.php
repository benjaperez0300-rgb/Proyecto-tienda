<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Compras</title>
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

        <h1>Compras</h1>
        <p>Lista de compras</p>
        <form action="{{ route('compras.store') }}" method="post">
            @csrf
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}">
            </div>
            <div class="campo">
                <label for="proveedor_id">Proveedor</label>
                <select name="proveedor_id" id="proveedor_id">
                    <option value="">Seleccionar proveedor</option>
                    @foreach ($proveedores as $proveedor)
                        <option value="{{ $proveedor->id }}" {{ old('proveedor_id') == $proveedor->id ? 'selected' : '' }}>
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
                        <option value="{{ $producto->id }}" {{ old('producto_id', $compra->producto_id) == $producto->id ? 'selected' : '' }}>
                            {{ $producto->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="campo">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fecha" value="{{ old('fecha', $compra->fecha) }}">
            </div>
            <div class="campo">
                <label for="total">Total</label>
                <input type="number" name="total" id="total" value="{{ old('total', $compra->total) }}" step="0.01">
            </div>
            <button type="submit">Crear Compra</button>
        </form>
        <h2>Compras registradas</h2>
        @if ($compras->isEmpty())
            <p>No hay compras registradas.</p>
        @else
            <ul>
                @foreach ($compras as $compra)
                    <li>
                        {{ $compra->id }} - {{ $compra->nombre }} - {{ $compra->proveedor->nombre }} - {{ $compra->producto->nombre }} - {{ $compra->cantidad }} - {{ $compra->fecha }} - {{ $compra->total }}
                    </li>
                @endforeach
            </ul>
        @endif  

    </main>
    
</body>
</html>