@extends('template.plantilla')
@section('contenedor')
<form action="{{ route('Usuarios.store') }}" method="POST">
    @csrf
    <div>
        <label for="">Nombre</label>
        <input type="text" name="nombre" class="form-control">
    </div>
    <div>
        <label for="">Contraseña</label>
        <input type="text" name="contraseña" class="form-control">
    </div>
    <div>
        <input  type="submit" value="Enviar" class="btn btn-success">
    </div>
</form>
@endsection