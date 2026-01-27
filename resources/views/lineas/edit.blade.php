<h2>Editar Línea #{{ $linea->id }}</h2>

<form action="{{ route('lineas.update', [$factura->id, $linea->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <input name="codigo" value="{{ $linea->codigo }}" placeholder="Código">
    <input name="cantidad" value="{{ $linea->cantidad }}" placeholder="Cantidad">
    <input name="descripcion" value="{{ $linea->descripcion }}" placeholder="Descripción">
    <input name="precio" value="{{ $linea->precio }}" placeholder="Precio">
    <input name="iva" value="{{ $linea->iva }}" placeholder="IVA %">

    <button type="submit">Guardar Cambios</button>
</form>
