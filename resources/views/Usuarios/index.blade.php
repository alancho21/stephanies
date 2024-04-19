@extends('template.plantilla')
@section('contenedor')
<hr>
<a href="{{ route('Usuarios.create') }}" class="btn btn-primary">Crear</a></a>
<hr>
<table class="table">
    <thead>
        <th>id</th>
        <th>Usuario</th>
        <th>Contraseña</th>
        <th>Opciones</th>
    </thead>
    <tbody>
        @foreach ($Usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->contraseña }}</td>
                <td class="btn-group">
                    <a href="{{ route('Usuarios.show', $usuario->id) }}"class="btn btn-primary">+</a> 
                    <a href="{{ route('Usuarios.edit', $usuario->id) }}"class="btn btn-warning">Editar</a> 
                    <form action="{{ route('Usuarios.destroy', $usuario->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Eliminar" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4"> {{$Usuarios->links()}} </td>
        </tr>
    </tfoot>
    </table>
</table>
@endsection