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
        <div class="row py-3 bg-secondary px-3">
            <div class="col">
                <span class="fs-4 text-white">GESTION DE INVENTARIO PARA FARMACIA ECONOMIK</span> <i class="material-symbols-outlined fs-3 text-white">store</i>
            </div>
        </div>
        <div class="row">
            <!-- Barra lateral -->
            <nav class="col-lg-2 col-md-3  d-md-block sidebar bg-white border-dark">
                <div class="position-sticky">
                    <!-- Contenido de la barra lateral -->
                    <ul class="nav flex-column">
                        <div class="user-info">
                            <div class="image py-3">
                                <img src="{{ asset('imagenes/user.png') }}" width="60" height="60" alt="User" />
                            </div>
                            <div class="info-container">
                                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Valentina Gonzalez</div>
                                <div class="email">Bodeguero</div>
                            </div>
                        </div>
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
                    @yield('contenido-principal')
                </div>
            </main>
        </div>
    </div>
</body>

</html>