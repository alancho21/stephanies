<!DOCTYPE html>
<html>
<head>
    <!-- Estilos comunes -->
    <link href="https://fonts.googleapis.com/css?family=Fredoka&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Courier+Prime&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('cssStyles/padre.css') }}">
    
    @yield('extra-css')
    <title>@yield('title', 'Bienvenido')</title>
</head>
<body>
    

    @yield('content')

</body>
</html>