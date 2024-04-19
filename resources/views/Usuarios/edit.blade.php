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
        <label for="">Email</label>
        <input type="text" name="email" value="{{$Usuarios->email}}" class="form-control">
    </div>
    <div>
        <input  type="submit" value="Enviar">
    </div>
</form>
@endsection