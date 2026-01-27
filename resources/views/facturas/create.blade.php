Formulario para una factura
<br><br>
<form action="{{ url('/facturas') }}" method="POST">
@csrf
@include('facturas.form', ['submit' => 'Crear factura', 'cancel' => 'Cancelar la creación']);
</form>