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
                                <th>Apellido</th>
                                <th>Compras</th>
                                <th>Borrar</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientesConCompras as $cliente)
                            <tr>
                                <td>{{$cliente->rut}}</td>
                                <td>{{$cliente->nombre}}</td>
                                <td>{{$cliente->apellido}}</td>
                                <td>{{$cliente->cantidad_compras}}</td>
                                <td>
                                    @if ($cliente->cantidad_compras >=1)
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-danger text-white"
                                            data-bs-toggle="modal" data-bs-target="#borrarCliente" disabled>
                                            <span class="material-symbols-outlined material-icons">delete</span>
                                        </button>
                                    </div>
                                    @else
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-danger text-white"
                                            data-bs-toggle="modal" data-bs-target="#borrarCliente{{$cliente->rut}}" >
                                            <span class="material-symbols-outlined material-icons">delete</span>
                                        </button>
                                    </div>
                                    @endif
                                    <!-- Modal Borrar -->
                                    <div class="modal fade" id="borrarCliente{{$cliente->rut}}" tabindex="-1"
                                        aria-labelledby="borrarClienteLabel{{$cliente->rut}}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="borrarClienteLabel{{$cliente->rut}}">
                                                        Confirmación de Borrado</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form method="POST"
                                                    action="{{route('administrador.clientes_borrar',$cliente->rut)}}">
                                                    @method('delete')
                                                    @csrf
                                                    <div class="modal-body">
                                                        <span class="text-dark">Este cliente no ha realizado compras ¿Estás seguro que quieres al cliente
                                                            </span><span
                                                            class="text-danger fw-bold">{{$cliente->nombre}} {{$cliente->apellido}}</span> <span
                                                            class="text-dark">?</span>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-danger">Borrar
                                                                Cliente</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-light" href="{{route('administrador.clientes_editar',$cliente->rut)}}">
                                        <span class="material-symbols-outlined material-icons text-white">edit</span>
                                    </a>
                                </td>
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