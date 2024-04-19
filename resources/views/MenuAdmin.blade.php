@extends('app')

@section('title', 'Menú Administrador')

@section('extra-css')
    {{-- Si tienes estilos específicos para esta vista, enlázalos aquí --}}
    <link href="{{ asset('cssStyles/menuAdmin.css') }}" rel="stylesheet">
@endsection

@section('content')
<body style="background: url('{{ asset('images/v152_180.png') }}') no-repeat center center fixed; background-size: cover;">

<section class="container">
    <div class="header">Bienvenido Admin</div>
    <div class="card-container">
        <div class="card" onclick="location.href='{{ route('products.index') }}'" >
            <img src="images\v225_131.png" class="icon" alt="Gestionar Menú">
            <div class="text">Gestionar Menú</div>
        </div>
        <div class="card" onclick="window.location.href='/gestionarUsuarios';" style="cursor: pointer;">
            <img src="images\v225_130.png" class="icon" alt="Gestionar Usuarios">
            <div class="text">Gestionar Usuarios</div>
        </div>
        <div class="card" onclick="window.location.href='/tendencias';" style="cursor: pointer;">
            <img src="images\v225_129.png" class="icon" alt="Inventario">
            <div class="text">Tendencias</div>
        </div>
    </div>

    <!-- Botón para cerrar sesión -->
    <div class="mt-3 card" style="cursor: pointer;" onclick="document.getElementById('logout-form').submit();">
  
        <div class="text">Cerrar Sesión</div>
    </div>

   

     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</section>

</body>
@endsection

