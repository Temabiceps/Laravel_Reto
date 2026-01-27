@if (count($errors) > 0)
<div class="alert alert-danger" role="alert">
<ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
</ul>
</div>
@endif

<div class="form-group">
<label for="nombre">Nombre</label>
<input type="text" name="nombre" id="nombre" maxlength="64"
        value="{{ isset($cliente->nombre) ? $cliente->nombre : old('nombre')}}"
        class="form-control">
</div>
<br>
<div class="form-group">
<label for="direccion">Direccion</label>
<input type="text" name="direccion" id="direccion" maxlength="64"
        value="{{ isset($cliente->direccion) ? $cliente->direccion : old('direccion')}}"
        class="form-control">
</div>
<br>
<div class="form-group">
<label for="email">Email</label>
<input type="email" name="email" id="email" maxlength="100"
        value="{{ isset($cliente->email) ? $cliente->email : old('email')}}"
        class="form-control">
</div>
<br>
<div class="form-group">
<label for="telefono">Teléfono</label>
<input type="text" name="telefono" id="telefono" maxlength="11"
        value="{{ isset($cliente->telefono) ? $cliente->telefono : old('telefono')}}"
        class="form-control">
</div>
<br>
<div class="form-group">
@if (isset($cliente->logo))
<img src="{{ asset('storage') . '/'. $cliente->logo }}" 
        class="img-thumbnail img-fluid">
@else
<label for="logo">Logo</label>
@endif
<input type="file" name="logo" id="logo" accept="image/" 
        class="form-control">
<br>
<input type="submit" value="{{$submit}}"
        class="btn btn-primary">

<a href="{{ url('clientes/') }}">
    <input type="button" value="{{ $cancel }}" 
    class="btn btn-success" />
</a>
