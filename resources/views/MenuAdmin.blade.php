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
            <div class="card" onclick="window.location.href='/users';" style="cursor: pointer;">
                <img src="images\v225_130.png" class="icon" alt="Gestionar Usuarios">
                <div class="text">Gestionar Usuarios</div>
            </div>
            <div class="card" >
                <img src="images\v225_129.png" class="icon" alt="Inventario">
                <div class="text">Tendencias</div>
            </div>
        </div>
    
</section>
</body>
@endsection