@extends('template.plantilla')
@section('contenedor')

<form action="{{ route('Usuarios.update', $Usuarios->id) }}" method="POST">
    @csrf
    @method("PUT")
    <div>
        <label for="">Nombre</label>
        <input type="text" name="nombre" value="{{$Usuarios->nombre}}" class="form-control">
    </div> 
    <div>
        <label for="">Contraseña</label>
        <input type="text" name="contraseña" value="{{$Usuarios->contraseña}}" class="form-control">
    </div>
    <div>
        <input  type="submit" value="Enviar">
    </div>
</form>
@endsection