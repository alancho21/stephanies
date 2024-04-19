@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Gestionar Usuarios</h2>

    <!-- Formulario para Crear o Editar -->
    <div class="card mb-4">
        <div class="card-header">
            @isset($user)
                Editar Usuario
            @else
                Agregar Usuario
            @endisset
        </div>
        <div class="card-body">
            <form action="{{ isset($user) ? route('gestionarUsuarios.update', $user->id) : route('gestionarUsuarios.store') }}" method="POST">
                @csrf
                @isset($user)
                    @method('PUT')
                @endisset
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name ?? '' }}" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                
                <div class="form-group">
                    <label for="role_id">Rol:</label>
                    <select class="form-control" id="role_id" name="role_id" required>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ isset($user) && $user->role_id == $role->id ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Dropdown List para Categoría -->
                <div class="form-group" id="categoryDropdown" style="display: none;">
                    <label for="category_id">Categoría:</label>
                    <select class="form-control" id="category_id" name="category_id" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">
                    @isset($user)
                        Actualizar
                    @else
                        Guardar
                    @endisset
                </button>
            </form>
        </div>
    </div>

    <!-- Lista de Usuarios -->
    <h3>Lista de Usuarios</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->role->name }}</td>
                <td>
                    <a href="{{ route('gestionarUsuarios.edit', $user->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('gestionarUsuarios.destroy', $user->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- JavaScript para Mostrar/Ocultar Dropdown de Categoría -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const roleDropdown = document.getElementById('role_id');
            const categoryDropdown = document.getElementById('categoryDropdown');

            roleDropdown.addEventListener('change', function() {
                if (this.value == 2) {
                    categoryDropdown.style.display = 'block';
                } else {
                    categoryDropdown.style.display = 'none';
                }
            });
        });
    </script>
</div>
@endsection
