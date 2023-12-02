@extends('templates.master')
@section('contenido-principal')

<div class="container p-5">
    <div class="row pb-2">
        <div class="col col-lg-12 d-flex justify-content-center py-4 ">
            <h1 class="">Nuevo Cliente</h1>
        </div>
    </div>
    <div class="container">
        <div class="mb-3 card w-80">
            <div class="card-body p-3 mb-5">
                <form action="#" method="POST" autocomplete="off">
                    @csrf
                    @method('PUT')
                    @include('validated.messages')
                    <div class="mb-5">
                        <label for="nombre" class="form-label">Rut</label>
                        <input type="text" class="form-control" id="rut" name="rut">
                    </div>
                    <div class="mb-5">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="mb-5">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido">
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection