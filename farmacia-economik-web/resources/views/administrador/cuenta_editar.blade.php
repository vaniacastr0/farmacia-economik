@extends('templates.master')
@section('contenido-principal')

<div class="container p-5">
    <div class="row pb-2">
        <div class="col col-lg-12 d-flex justify-content-center py-4 ">
            <h1 class="">Edicion de Usuario</h1>
        </div>
    </div>
    <div class="container">
        <div class="mb-3 card w-80">
            <div class="card-body p-3 mb-5">
                <form action="{{ route('administrador.actualizar_cuenta', $usuario->rut)}}" method="POST" autocomplete="off">
                    @csrf
                    @method('PUT')
                    @include('validated.messages')
                    <div class="mb-5">
                        <label for="nombre" class="form-label">Rut</label>
                        <input type="text" class="form-control" id="rut" name="rut" value="{{$usuario->rut }}" disabled>
                    </div>
                    <div class="mb-5">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $usuario->nombre }}">
                    </div>
                    <div class="mb-5">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido"
                            value="{{ $usuario->apellido }}">
                    </div>
                    <div class="mb-5">
                        <label for="tipo_usuario" class="form-label">Tipo de usuario</label>
                        <select class="form-control" id="tipo_usuario" name="tipo_usuario">
                            @if ($activeAdmi)
                            @if ($usuario->tipo_usuario == 'B')
                            <option selected value="B">Bodeguero</option>
                            <option value="V">Vendedor</option>
                            @else
                            <option selected value="V">Vendedor</option>
                            <option value="B">Bodeguero</option>
                            @endif
                            @endif
                        </select>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-lg-2 px-4">
            <a href="javascript:history.back()" class="btn btn-secondary">Volver</a>
        </div>
        
    </div>
</div>
@endsection