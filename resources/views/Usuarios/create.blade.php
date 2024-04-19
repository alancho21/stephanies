<form action="{{ route('usuarios.store') }}" method="POST">
    @csrf
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
    </div>
    <div>
        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" required>
    </div>
    <div>
        <label for="rol">Rol:</label>
        <input type="text" name="rol" required>
    </div>
    <button type="submit">Guardar</button>
</form>
