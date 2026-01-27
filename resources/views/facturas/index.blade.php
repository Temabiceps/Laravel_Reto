@extends('layouts.app')
@section('content')

<div class="container">

Gestión de las facturas.

@if (Session::has('mensaje'))

<div class="alert alert-success alert-dismissible" role="alert">

{{ Session::get('mensaje') }}

<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times</span>
</button>
</div>

@endif

<table class="table table-light">
    <thead class="thead-light">
        <tr>    
            <th>Id</th>
            <th>Numero</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Base</th>
            <th>Importe I.V.A.</th>
            <th>Importe</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($facturas) && (count($facturas) > 0))
        @foreach ($facturas as $factura)
        <tr>
    <td>{{ $factura->id }}</td>
    <td>{{ $factura->numero }}</td>
    <td>{{ $factura->fecha }}</td>
    @if (isset($facturascliente))
    <td>{{ $factura->nombre }}</td>
    @else
    <td>{{ $factura->cliente->nombre }}</td>
    @endif
    <td>{{ $factura->lineas->sum('base') }}</td>
    <td>{{ $factura->lineas->sum('importeiva') }}</td>
    <td>{{ $factura->lineas->sum('importe') }}</td>

    <td>
        <a href="{{ route('lineas.index', $factura->id) }}" class="btn btn-primary">
            Ver Líneas
        </a>
    </td>

    <td>
        <a href="{{ url('/facturas/' . $factura->id . '/edit') }}">Editar</a>

        <form action="{{ url('/facturas/' . $factura->id) }}" method="POST">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit"
            onclick="return confirm('¿Quiere borrar la factura seleccionada?')"
            value="Borrar">
        </form>
    </td>
</tr>
        @endforeach
        @else
        <tr>
            <td colspan="8">Sin facturas</td>
        </tr>
        @endif

    </tbody>
    <tfoot>
        <tr>
            <td colspan ="7">
                <a href="{{ url('facturas/create') }}"
                class="btn btn-primary">Nuevo</a></td>
        </tr>
    </tfoot>
</table>

{!! $facturas->links() !!}

</div>

@endsection