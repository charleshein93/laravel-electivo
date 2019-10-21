@extends('template')

@section('content')
    <div class="container">
        <h1>Nómina de Boletas</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Fecha</th>
                <th>Monto</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($boletas as $boleta)
                <tr>
                    <td>{{ $boleta->numero }}</td>
                    <td>{{ $boleta->fecha }}</td>
                    <td>{{ $boleta->monto }}</td>
                    <td>
                        <a href="{{ route('boletas.modificar', [$boleta]) }}">Editar</a>
                        <form action="{{ route('boletas.eliminar', [$boleta]) }}" method="post">
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
