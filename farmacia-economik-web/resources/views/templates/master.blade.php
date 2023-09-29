<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Home</title>
    <style>
        /* Estilo personalizado para la barra lateral */
        .sidebar {
            height: 100vh;
            /* Establece la altura al 100% del viewport */
            background-color: #fff;
            /* Color de fondo de la barra lateral */
            color: #000;
            /* Color del texto en la barra lateral */
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Barra lateral -->
            <nav class="col-lg-2 col-md-3  d-md-block sidebar bg-white">
                <div class="position-sticky">
                    <!-- Contenido de la barra lateral -->
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active text-dark" href="#">
                                <h3>Farmacia Economik</h3>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{route('bodeguero.productos')}}">
                                Ver Productos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{route('bodeguero.agregar')}}">
                                Agregar Productos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#">
                                Actualizar Productos
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-dark" href="#">
                                Eliminar Productos
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Contenido principal -->
            <main class="col-lg-10 col-md-9 ms-sm-auto px-md-4 bg-light">
                <div class="container-fluid">
                    <!-- barra usuario -->
                    <div class="container-fluid">
                        <div class="row bg-ligth text-dark">
                            <div class="col-8">
                                Bienvenido <span class="fw-bold">Bodeguero</span> Valenina Gonzalez. 
                            </div>
                            <div class="col-3">
                                Último inicio de sesión: 01/04/2023 a las 18:34 
                            </div>
                            <div class="col-1 text-end d-none d-lg-block">
                                <a href="{{route('login.login')}}" class="text-dark">Cerrar Sesión</a>
                            </div>
                        </div>
                    </div>
                    @yield('contenido-principal')
                </div>
            </main>
        </div>
    </div>
</body>

</html>