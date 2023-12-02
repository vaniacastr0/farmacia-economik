@extends('templates.master')

@section('contenido-principal')

<div class="container p-5">
    <div class="row py-3">
        <div class="col-9">
            <h1 class="">Gestión de Clientes</h1>
        </div>
        <div class="col-2">
            <a href="{{route('administrador.clientes_agregar')}}" class="btn btn-info text-white">Agregar Cliente</a>
        </div>
    </div>
    <div class="container">
        <div class="row bg-white">
            <div class="col-6 order-last order-lg-first"></div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Rut</th>
                                <th>Nombre</th>
                                <th>Apelldio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{$cliente->rut}}</td>
                                <td>{{$cliente->nombre}}</td>
                                <td>{{$cliente->apellido}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection