@extends('app')

@section('title', 'Inicio de Sesión')

@section('extra-css')
    <link href="{{ asset('cssStyles/inicioSesion.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
@endsection

@section('content')
<!-- Bootstrap Container Fluid y Row -->
<section class="container-fluid fondo">
        <div class="row">
            <aside class="col-lg-6 d-none d-lg-block position-relative">
                <!-- Contenido de la columna para pantallas grandes -->
                <img src="images/v24_23.png" alt="imagen" class="img-fluid borroso">
                <!-- Texto encima de la imagen -->
                <div class="texto-encima">
                    <h1>Registrate hoy y <br> recibe un 15% de <br>descuento en tu <br>primera compra</h1>
                </div>

                <div class="texto-encima2">
                    <h1>*Válido para nuevos usuarios</h1>
                </div>
            </aside>

            <!-- Columna Principal para el Contenido -->
            <div class="col-lg-6">


                <!-- Contenido de tu página -->
                <section class="form-section">
        <h1 id="titulo">Registrate para Continuar</h1>
        <img id="logo"src="images/v7_17.png" alt="logo">
        <div class="user-form-container">
            <form id="user-form"   method="POST">
            @csrf
                <!-- Campos de formulario aquí -->
                <div class="input-group"><label for="nombre">Nombre</label><input type="text"  id="Nombre" name="nombre"></div>
                <div class="input-group"><label for="id">Apellidos</label><input type="text"  id="Apellidos" name="apellidos"></div>
                <div class="input-group"><label for="edad">Edad</label><input type="number" id="Edad" name="edad"></div>
                <div class="input-group"><label for="telefono">Telefono</label><input type="number" id="Telefono" name="telefono"></div>
                <div class="input-group"><label for="correo">Correo</label><input type="email" id="Correo" name="correo"></div>
                <div class="input-group"><label for="contraseña">Contraseña</label><input type="text" id="Contraseña" name="contraseña"></div>

                <!-- ... otros campos ... -->
            
   
        </div>
        <div class="footer-buttons">
        
        <button type="submit" class="btn footer">Continuar</button>
        </div>
        </form>
    </section>
            </div>
    </section>
    <!-- Agrega el enlace al archivo JS de Bootstrap y jQuery (opcional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-pzjw8ZmIzazaMoXkPTLRepz9n6xwYmhQYTD8De5FGrL3xKb5t7A2MByy1aPnC1x" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy/KcMMp16jT6ElKak6IKOZ81Kh6ZA6FVR" crossorigin="anonymous"></script>
    
    @endsection