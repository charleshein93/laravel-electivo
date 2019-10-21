@extends('template')

@section('content')
    <div class="container">
        <h1>Nueva Factura</h1>
        <form action="" method="post">
            <div>
                @csrf
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="text" class="form-control" id="fecha" aria-describedby="fecha-help" placeholder="01/01/1990" name="fecha">
                    <small id="fecha-help" class="form-text text-muted">Fecha de Emisión de la Factura</small>
                </div>
                <div class="form-group">
                    <label for="iva">IVA</label>
                    <input type="text" class="form-control" id="iva" aria-describedby="iva-help" placeholder="19" name="iva">
                    <small id="iva-help" class="form-text text-muted">Valor del IVA</small>
                </div>
                <div class="form-group">
                    <label for="monto">Monto</label>
                    <input type="text" class="form-control" id="monto" aria-describedby="monto-help" placeholder="500000" name="monto">
                    <small id="monto-help" class="form-text text-muted">Monto de la venta</small>
                </div>
                <button class="btn btn-success">Agregar</button>
            </div>
        </form>
    </div>
@endsection
