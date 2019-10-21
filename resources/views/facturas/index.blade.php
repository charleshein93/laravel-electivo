@extends('template')

@section('content')
    <div class="container">
        <h1>Nómina de Facturas</h1>
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Fecha</th>
                <th>Iva</th>
                <th>Monto</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($facturas as $factura)
                <tr>
                    <td>{{ $factura->numero }}</td>
                    <td>{{ $factura->fecha }}</td>
                    <td>{{ $factura->iva }}</td>
                    <td>{{ $factura->monto }}</td>
                    <td>
                        <a href="{{ route('facturas.modificar', [$factura]) }}">Editar</a>
                        <form action="{{ route('facturas.eliminar', [$factura]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
