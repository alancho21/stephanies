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
            <div class="card" onclick="window.location.href='/cajeroVer';" >
                <img src="images\v225_131.png" class="icon" alt="Gestionar Menú">
                <div class="text">Ordenes Pendientes</div>
            </div>
            <div class="card" onclick="window.location.href='/cajeroCrear';" style="cursor: pointer;">
                <img src="images\v225_130.png" class="icon" alt="Gestionar Usuarios">
                <div class="text">Nueva Orden</div>
            </div>
       
        </div>
    
</section>
</body>
@endsection