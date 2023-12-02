@extends('templates.master')
@section('contenido-principal')

<div class="container p-5">
    <div class="row pb-2">
        <div class="col col-lg-12 d-flex justify-content-center py-4 ">
            <h1 class="">Edicion de Cliente</h1>
        </div>
    </div>
    <div class="container">
        <div class="mb-3 card w-80">
            <div class="card-body p-3 mb-5">
                <form action="{{ route('administrador.cliente_actualizar', $cliente->rut)}}" method="POST" autocomplete="off">
                    @csrf
                    @method('PUT')
                    @include('validated.messages')
                    <div class="mb-5">
                        <label for="nombre" class="form-label">Rut</label>
                        <input type="text" class="form-control" id="rut" value="{{$cliente->rut}}" name="rut" disabled>
                    </div>
                    <div class="mb-5">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$cliente->nombre}}">
                    </div>
                    <div class="mb-5">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="{{$cliente->apellido}}">
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