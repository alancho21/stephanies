<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestionar Usuarios</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex justify-content-between">
    <a href='/menuadmin' class="btn btn-danger ml-auto">Regresar</a>
</div>
<div class="container mt-5">
    <h2 class="text-center mb-4">Gestionar Usuarios</h2>

    <!-- Formulario para Crear o Editar -->
    <div class="card">
        <div class="card-header bg-primary text-white">
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

                <button type="submit" class="btn btn-primary btn-block">
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
    <h3 class="mt-4">Lista de Usuarios</h3>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#role_id').change(function() {
                if ($(this).val() == 2) {
                    $('#categoryDropdown').show();
                } else {
                    $('#categoryDropdown').hide();
                }
            });
        });
    </script>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</div>

</body>
</html>
