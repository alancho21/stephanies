@extends('app')

@section('title', 'Gestionar Menú')

@section('extra-css')
    {{-- Si tienes estilos específicos para esta vista, enlázalos aquí --}}
    <link href="{{ asset('css/GestionarMenu.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection

@section('content')
<section class="form-section">
    <h1>Gestionar Menu</h1>
    <div class="user-form-container">
        <!-- Añadido el método POST, la acción de la ruta y el atributo enctype para manejo de archivos -->
        <form id="user-form" action="{{ route('guardarmenu') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- Token CSRF para la seguridad del formulario -->
            <!-- Campos de formulario aquí -->
            <div class="input-group">
                <label for="id">Id</label>
                <input type="text" id="id" name="id">
            </div>
            <div class="input-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre">
            </div>
            <div class="input-group">
                <label for="precio">Precio</label>
                <input type="text" id="precio" name="precio">
            </div>
            <div class="input-group">
                <label for="categoria">Categoria _id</label>
                <input type="text" id="categoria" name="categoria_id">
            </div>
            <div class="input-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" id="descripcion" name="descripcion">
            </div>
            <div class="input-group">
                <label for="imagen">Imagen</label>
                <!-- Cambio a tipo file para la carga de imágenes -->
                <input type="file" id="imagen" name="imagen">
            </div>
            <!-- Botón de tipo submit para enviar el formulario -->
            <button type="submit" class="btn action">Agregar</button>
        </form>
        <div class="action-buttons">
            <!-- Botones adicionales (su funcionalidad debe ser definida en otro lugar) -->
            <button type="button" class="btn action">Modificar</button>
            <div class="input-group">
    <button type="button" class="btn action" id="eliminarProducto">Eliminar</button>

</div>

            <button type="button" class="btn action">Buscar</button>
            <button type="button" class="btn action" onclick="location.href='{{ route('consultarmenu') }}'">Consultar</button>
        </div>
    </div>
    <div class="footer-buttons">
        <button type="button" class="btn footer" onclick="location.href='{{ route('menuadmin') }}'">Regresar</button>
    </div>
</section>

<script>
    $(document).ready(function() {
        // Manejar clic en el botón "Eliminar"
        $('#eliminarProducto').click(function() {
            var otroIdValor = $('#id').val(); // Obtener el valor del campo "Otro ID"
            
            // Asignar el valor a campo "Id"
           
$('#ID').val(otroIdValor);


            // Realizar una solicitud AJAX para eliminar el producto
            $.ajax({
                url: '/eliminar-producto/' + otroIdValor, // Asegúrate de que la URL coincida con la ruta en tu controlador
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    // Realizar acciones adicionales después de la eliminación (por ejemplo, mostrar un mensaje)
                    alert(response.message);
                },
                error: function(error) {
                    // Manejar errores si es necesario
                    console.log(error);
                }
            });
        });
    });
</script>



@endsection