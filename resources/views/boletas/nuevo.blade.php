@extends('template')

@section('content')
    <div class="container">
        <h1>Nueva Boleta</h1>
        <form action="" method="post">
            <div>
                @csrf
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="text" class="form-control" id="fecha" aria-describedby="fecha-help" placeholder="01/01/1990" name="fecha">
                    <small id="fecha-help" class="form-text text-muted">Fecha de Emisión de la Boleta</small>
                </div>
                <div class="form-group">
                    <label for="monto">Monto</label>
                    <input type="text" class="form-control" id="nombre" aria-describedby="monto-help" placeholder="500000" name="monto">
                    <small id="monto-help" class="form-text text-muted">Monto de la venta</small>
                </div>
                <button class="btn btn-success">Agregar</button>
            </div>
        </form>
    </div>
@endsection
