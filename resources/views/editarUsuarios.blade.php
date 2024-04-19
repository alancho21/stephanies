@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Usuario</h2>

    <div class="card mb-4">
        <div class="card-header">
            Editar Usuario
        </div>
        <div class="card-body">
            <form action="{{ route('gestionarUsuarios.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="role_id">Rol:</label>
                    <select class="form-control" id="role_id" name="role_id" required>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @if($user->role_id == 2)
                    <div class="form-group">
                        <label for="category_id">Categoría:</label>
                        <select class="form-control" id="category_id" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $user->categories->contains('id', $category->id) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection
