@if(auth()->check() && auth()->user()->tipo_usuario == "V")

@extends('templates.master')

@section('contenido-principal')
<div class="container d-flex justify-content-center mb-3 bg-white">
    <div class="row">
        <div class="col-12 col-lg-6 justify-content-center">
            <h4>Pagina principal</h4>
        </div>
    </div>
</div>
@endsection

@endif