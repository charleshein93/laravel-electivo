@extends('template')

@section('content')
    <div class="container">
        <h1>Modificar Producto: {{ $producto->nombre }}</h1>
        <form action="" method="post">
            <div>
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="codigo">Código</label>
                    <input type="number" class="form-control" id="codigo" aria-describedby="codigo-help" placeholder="0000" name="numero" value="{{ $producto->numero }}">
                    <small id="codigo-help" class="form-text text-muted">Código numérico que identifica al producto</small>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" aria-describedby="nombre-help" placeholder="Ej: Lápiz de color" max="100" name="nombre" value="{{ $producto->nombre }}">
                    <small id="nombre-help" class="form-text text-muted">Nombre y Descripción del producto</small>
                </div>
                <button class="btn btn-success">Actualizar</button>
            </div>
        </form>
    </div>
@endsection
