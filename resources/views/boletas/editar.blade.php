@extends('template')

@section('content')
    <div class="container">
        <h1>Editar Boleta: #{{ $boleta->numero }}</h1>
        <form action="" method="post">
            <div>
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="text" class="form-control" id="fecha" aria-describedby="fecha-help" placeholder="01-01-1990" name="fecha" value="{{ $boleta->fecha->format('d/m/Y') }}">
                    <small id="fecha-help" class="form-text text-muted">Fecha de Emisión de la Boleta</small>
                </div>
                <div class="form-group">
                    <label for="monto">Monto</label>
                    <input type="text" class="form-control" id="monto" aria-describedby="monto-help" placeholder="500000" name="monto" value="{{ $boleta->monto }}">
                    <small id="monto-help" class="form-text text-muted">Monto de la venta</small>
                </div>
                <button class="btn btn-success">Actualizar</button>
            </div>
        </form>
    </div>
@endsection
