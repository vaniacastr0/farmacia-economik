<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
    <title>Register</title>
</head>
<body style="background: linear-gradient(156deg, #1c8afb 30%, #c5e5f4 85%)">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card w-75">
            <div class="card-header bg-successs">
                <h1 class="fw-bold text-center py-4">Registro de Usuarios</h1>
            </div>
            <div class="card-body p-4">
                <form action="/register" method="POST" autocomplete="off">
                    @csrf
                    @include('validated.messages')
                    <div class="mb-3">
                        <label for="rut" class="form-label">Rut</label>
                        <input type="text" class="form-control" id="rut" name="rut" value="{{ old('rut') }}">
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido') }}">
                    </div>
                    <div class="mb-3">
                        <label for="tipo_usuario" class="form-label">Tipo de usuario</label>
                        <select class="form-control" id="tipo_usuario" name="tipo_usuario">
                            <option selected disabled>Seleccione una opción</option>
                            <option value="B">Bodeguero</option>
                            <option value="V">Vendedor</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" >
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Registrarse</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>
</body>
</html>