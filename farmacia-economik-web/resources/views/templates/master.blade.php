<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
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
                <span class="fs-4 text-white">GESTION DE INVENTARIO PARA FARMACIA ECONOMIK</span> <i
                    class="material-symbols-outlined fs-3 text-white">store</i>
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
                                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Valentina Gonzalez</div>
                                <div class="email">Bodeguero</div>
                            </div>
                        </div>
                        <li class="nav-item">
                            <a class="nav-link text-dark" data-bs-toggle="collapse" href="#mantencionTablas">
                                <i class="fas fa-caret-down" style="margin-right: 10px;"></i> Mantención de Tabla Producto
                            </a>
                            <div class="collapse" id="mantencionTablas">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="{{route('bodeguero.mantencion_verproductos')}}" style="padding-left: 30px;">
                                            <i class="material-symbols-outlined align-middle fs-4" style="margin-right: 10px;">inventory_2</i>Ver productos
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="{{route('bodeguero.mantencion_agregarproducto')}}" style="padding-left: 30px;">
                                            <i class="material-symbols-outlined align-middle" style="margin-right: 10px;">add_circle</i>Agregar Producto
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="#" style="padding-left: 30px;">
                                            <i class="material-symbols-outlined align-middle" style="margin-right: 10px;">delete</i>Eliminar producto
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="{{route('bodeguero.mantencion_actualizarproductoslistado')}}" style="padding-left: 30px;">
                                            <i class="material-symbols-outlined align-middle" style="margin-right: 10px;">update</i>Actualizar producto
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" data-bs-toggle="collapse" href="#ajustes">
                                <i class="fas fa-caret-down" style="margin-right: 10px;"></i>Ajustes de Productos
                            </a>
                            <div class="collapse" id="ajustes">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="{{route('bodeguero.ajustes_listadojustes')}}" style="padding-left: 30px;">
                                            <i class="material-symbols-outlined align-middle fs-4" style="margin-right: 10px;">sort</i>Listado de ajustes
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="{{route('bodeguero.ajustes_eliminarcantidades')}} " style="padding-left: 30px;">
                                            <i class="material-symbols-outlined align-middle fs-4" style="margin-right: 10px;">docs_add_on</i>Ingresar un ajuste
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" data-bs-toggle="collapse" href="#ingreso_productos">
                                <i class="fas fa-caret-down" style="margin-right: 10px;"></i> Ingreso de Productos
                            </a>
                            <div class="collapse" id="ingreso_productos">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="{{route('bodeguero.ingreso_agregarcantidades')}}" style="padding-left: 30px;">
                                            <i class="material-symbols-outlined align-middle fs-4" style="margin-right: 10px;">sort</i>Ingreso
                                        </a>
                                    </li>
        
                                </ul>
                            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>