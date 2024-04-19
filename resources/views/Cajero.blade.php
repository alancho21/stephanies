<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Proyecto Laravel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .half {
            width: 50%;
            padding: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #ddd;
        }
        .btn:active {
            background-color: #ccc;
        }
        .logout-btn {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="half">
            <h1>Bienvenido</h1>
            <p>Selecciona una opción:</p>
            <a href="/cajeroCrear"><button class="btn">Crear orden</button></a>
            <a href="/cajeroVer"><button class="btn">Ver ordenes</button></a>
        </div>
        <div class="half">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn logout-btn">Cerrar Sesión</button>
            </form>
        </div>
    </div>

    <script>
        // Agregar funcionalidad adicional con JavaScript si es necesario
    </script>
</body>
</html>

