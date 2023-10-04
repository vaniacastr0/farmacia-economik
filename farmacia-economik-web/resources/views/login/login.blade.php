<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
    <title>Login</title>
</head>

<body style="background: linear-gradient(156deg, #1c8afb 30%, #c5e5f4 85%)">
    <div class="container bg-white rounded shadow my-5">
        <div class="row">
            <div class="col-md-6 d-flex">
                <img class="img-fluid" src="imagenes/medical-5459632_1280.png" alt="" />
            </div>
            <div class="col-md-6">
                <div class="p-5">
                    <h1 class="fw-bold text-center py-2">
                        Bienvenido a farmacia Economik
                    </h1>
                    <form action="/" method="POST" autocomplete="off">
                        @csrf
                        @include('validated.messages')
                        <div class="mb-4 mt-5">
                            <label for="rut" class="form-label">Rut</label>
                            <input type="text" class="form-control" id="rut" name="rut"/>
                        </div>
                        <div class="mb-4 mt-5">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password"/>
                        </div>
                        <div class="d-grid my-4">
                            <button type="submit" class="btn btn-primary" href="{{route('inicio.bodeguero')}}">
                                Iniciar Sesión
                            </button> 
                        </div>
                        <div class="d-grid my-4">
                            <a href="{{route('register.show')}}">Registrarse</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>