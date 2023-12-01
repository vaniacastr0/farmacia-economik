@extends('templates.master')

@section('contenido-principal')

<div class="container p-5">
    <div class="row pb-2">
        <div class="col-9">
            <h1 class="">Gestión de cuentas</h1>
        </div>
        <div class="col-3">
            <a href="#" class="btn btn-info">Nueva cuenta(arreglar)</a>
        </div>
    </div>
    <div class="container">
        <div class="row bg-white">
            <div class="col-12 order-last order-lg-first"></div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Tipo perfil</th>
                                <th>Rut</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Borrar</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cuentas as $cuenta)
                            <tr>
                                @if($cuenta->tipo_usuario =='B')
                                <td>{{
                                    'Bodeguero'
                                    }}</td>
                                @elseif($cuenta->tipo_usuario =='V')
                                <td>{{
                                    'Vendedor'
                                    }}</td>
                                @else
                                <td>{{
                                    'Administrador'
                                    }}</td>
                                @endif
                                <td>{{ $cuenta->rut }}</td>
                                <td>{{ $cuenta->nombre }}</td>
                                <td>{{ $cuenta->apellido }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-danger text-white"
                                            data-bs-toggle="modal" data-bs-target="#borrarModal{{$cuenta->rut}}">
                                            <span class="material-symbols-outlined material-icons">delete</span>
                                        </button>
                                    </div>
                                    <!-- Modal Borrar -->
                                    <div class="modal fade" id="borrarModal{{$cuenta->rut}}" tabindex="-1"
                                        aria-labelledby="borrarModalLabel{{$cuenta->rut}}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="borrarModalLabel{{$cuenta->rut}}">
                                                        Confirmación de Borrado</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form method="POST"
                                                    action="{{ route('administrador.borrar_cuenta', $cuenta->rut) }}">
                                                    @method('delete')
                                                    @csrf
                                                    @if(auth()->user()->rut == $cuenta->rut)
                                                    <div class="modal-body">
                                                        <span class="px-3 py-3">No es posible eliminarte a ti mismo</span>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal">Aceptar</button>
                                                        </div>
                                                    </div>
                                                    @elseif($cuenta->tipo_usuario == 'A')
                                                    <div class="modal-body">
                                                        <span class="px-3 py-3">No se puede borrar una cuenta
                                                            Administrador</span>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal">Aceptar</button>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @if($cuenta->tipo_usuario != 'A')
                                                    <div class="modal-body">
                                                        <span class="text-dark">¿Estas seguro que quieres borrar al
                                                            usuario</span> <span
                                                            class="text-danger fw-bold">{{$cuenta->nombre}}</span> <span
                                                            class="text-dark">?</span>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-danger">Borrar
                                                                Cuentar</button>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if ($cuenta->tipo_usuario === 'A')
                                    <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                        data-bs-target="#EditarModal{{ $cuenta->rut }}">
                                        <span class="material-symbols-outlined material-icons">edit</span>
                                    </button>
                                    @elseif ($cuenta->tipo_usuario != 'A')
                                    <a class="btn btn-light" href="{{ route('administrador.cuenta_editar', $cuenta->rut) }}">
                                        <span class="material-symbols-outlined material-icons">edit</span>
                                    </a>
                                    @endif
                                    <!-- Modal Edicion -->
                                    @if ($cuenta->tipo_usuario === 'A')
                                    <div class="modal fade" id="EditarModal{{$cuenta->rut}}" tabindex="-1"
                                        aria-labelledby="EditarModalLabel{{$cuenta->rut}}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="borrarModalLabel{{$cuenta->rut}}">Edición de usuario
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <span class="text-danger px-3">No es posible editar a un Administrador</span>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Aceptar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </td>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection