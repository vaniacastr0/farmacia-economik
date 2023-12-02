@extends('templates.master')

@section('contenido-principal')

<div class="container p-5">
    <div class="row pb-2">
        <div class="col col-lg-12 d-flex  justify-content-center py-4">
            <h1 class="">Gestión de Categorías</h1>
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
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Cantidad Productos</th>
                                <th>Borrar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categoriasConCantidad as $categoria)
                            <tr>
                                <td>{{$categoria->id_categoria}}</td>
                                <td>{{$categoria->nombre}}</td>
                                <td>{{$categoria->cantidad_productos}}</td>
                                <td>
                                    @if ($categoria->cantidad_productos >= 1)
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-danger text-white"
                                            data-bs-toggle="modal" data-bs-target="#borrarCategoria{{$categoria->id_categoria}}" disabled>
                                            <span class="material-symbols-outlined material-icons">delete</span>
                                        </button>
                                    </div>
                                    @else
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-danger text-white"
                                            data-bs-toggle="modal" data-bs-target="#borrarCategoria{{$categoria->id_categoria}}">
                                            <span class="material-symbols-outlined material-icons">delete</span>
                                        </button>
                                    </div>
                                    @endif
                                    <!-- Modal Borrar -->
                                    <div class="modal fade" id="borrarCategoria{{$categoria->id_categoria}}" tabindex="-1"
                                        aria-labelledby="borrarCategoriaLabel{{$categoria->id_categoria}}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="borrarCategoriaLabel{{$categoria->id_categoria}}">
                                                        Confirmación de Borrado</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form method="POST"
                                                    action="{{ route('administrador.categoria_borrar', $categoria->id_categoria) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <div class="modal-body">
                                                        <span class="text-dark">No existe producto con esta categoría ¿Estás seguro que quieres la categoría
                                                            </span><span
                                                            class="text-danger fw-bold">{{$categoria->nombre}}</span> <span
                                                            class="text-dark">?</span>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-danger">Borrar
                                                                Categoría</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
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