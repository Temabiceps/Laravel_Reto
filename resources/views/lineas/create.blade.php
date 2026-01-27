@extends('layouts.app')
@section('content')

<div class="container">
    <h2>Crear línea para factura: {{ $factura->numero }}</h2>

    <form action="{{ route('lineas.store', $factura->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Código</label>
            <input type="number" name="codigo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Descripción</label>
            <input type="text" name="descripcion" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Cantidad</label>
            <input type="number" step="0.01" name="cantidad" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Precio</label>
            <input type="number" step="0.01" name="precio" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>IVA (%)</label>
            <input type="number" step="0.01" name="iva" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('lineas.index', $factura->id) }}" class="btn btn-secondary">Volver</a>
    </form>
</div>

@endsection
