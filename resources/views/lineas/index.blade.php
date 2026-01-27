@extends('layouts.app')
@section('content')

<div class="container">
    <h2>Líneas de la factura: {{ $factura->numero }}</h2>

    <table class="table table-light">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Base</th>
                <th>IVA</th>
                <th>Importe IVA</th>
                <th>Importe</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lineas as $linea)
            <tr>
                <td>{{ $linea->codigo }}</td>
                <td>{{ $linea->descripcion }}</td>
                <td>{{ $linea->cantidad }}</td>
                <td>{{ $linea->precio }}</td>
                <td>{{ $linea->base }}</td>
                <td>{{ $linea->iva }}</td>
                <td>{{ $linea->importeiva }}</td>
                <td>{{ $linea->importe }}</td>
            </tr>

            
    <td>
    <a href="{{ route('lineas.edit', [$factura->id, $linea->id]) }}" class="btn btn-warning btn-sm">Editar</a>
    <form action="{{ route('lineas.destroy', [$factura->id, $linea->id]) }}" method="POST" style="display:inline-block">
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Borrar línea?')" value="Borrar">
    </form>
</td>
            @endforeach
        </tbody>
    </table>

    <a href="{{ url('/facturas') }}" class="btn btn-primary">Volver</a>

    <a href="{{ route('lineas.create', $factura->id) }}" class="btn btn-success mb-2">Crear Línea</a>

</div>

@endsection
