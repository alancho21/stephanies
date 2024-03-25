@extends('app')

@section('title', 'Gestionar Usuarios')

@section('extra-css')
    <link href="{{ asset('css/gestionarUsuarios.css') }}" rel="stylesheet">
@endsection

@section('content')

<section class="form-section">
        <h1>Gestionar Usuarios</h1>
        <div class="user-form-container">
            <form id="user-form">
                <!-- Campos de formulario aquí -->
                <div class="input-group"><label for="id">Id</label><input type="text" id="id" name="id"></div>
                <div class="input-group"><label for="nombre">Nombre</label><input type="text" id="Nombre" name="nombre"></div>
                <div class="input-group"><label for="apellido">Apellido</label><input type="text" id="Apellido" name="apellido"></div>
                <div class="input-group"><label for="edad">Edad</label><input type="text" id="Edad" name="edad"></div>
                <div class="input-group"><label for="telefono">Telefono</label><input type="text" id="Telefono" name="telefono"></div>
                <div class="input-group"><label for="correo">Correo</label><input type="email" id="Correo" name="correo"></div>
                <div class="input-group"><label for="correo">Contraseña</label><input type="email" id="Correo" name="correo"></div>
                <div class="input-group"><label for="tipo">Tipo</label><input type="text" id="Tipo" name="tipo"></div>
                <!-- ... otros campos ... -->
            </form>
            <div class="action-buttons">
                <button type="button" class="btn action">Agregar</button>
                <button type="button" class="btn action">Modificar</button>
                <button type="button" class="btn action">Eliminar</button>
                <button type="button" class="btn action">Buscar</button>
                <button type="button" class="btn action" onclick="location.href='{{ route('consultarusuarios') }}'">Consultar</button>
            </div>
        </div>
        <div class="footer-buttons">
        
            <button type="button" class="btn footer" onclick="location.href='{{ route('menuadmin') }}'">Regresar</button>
        </div>
    </section>
@endsection
