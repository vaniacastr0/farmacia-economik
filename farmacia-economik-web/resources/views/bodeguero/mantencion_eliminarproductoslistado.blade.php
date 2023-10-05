@extends('templates.master')

@section('contenido-principal')
<div class="container-fluid d-flex flex-column justify-content-lg-center align-items-center">
    <div class="row">
        <div class="col-12 d-flex justify-content-center py-4">
            <h3>Eliminar Producto</h3>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg">
                <div class="row bg-white">
                    <div class="col-12  py-3 order-last order-lg-first">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Stock</th>
                                            <th>Categoria</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{ $producto->id_producto }}</td>
                                            <td>{{ $producto->nombre_producto }}</td>
                                            <td>{{ $producto->precio_producto }}</td>
                                            <td>{{ $producto->stock_producto }}</td>
                                            <td>{{ $producto->Categoria->nombre }}</td>
                                            <td>
                                                <div class="modal fade" id="borrarModal{{$producto->id_producto}}" tabindex="-1"
                                                    aria-labelledby="borrarModalLabel{{$producto->id_producto}}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="borrarModalLabel{{$producto->id_producto}}">
                                                                    Confirmación de borrado</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST" action="{{route('bodegueros.mantencion_eliminarproductodelete', $producto->id_producto)}}">
                                                                @method('delete')
                                                                @csrf
                                                                <div class="modal-body">
                                                                    ¿Esta seguro que desea eliminar el producto <span
                                                                        class="text-primary fw-bold">{{$producto->nombre_producto}}</span>?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light"
                                                                        data-bs-dismiss="modal">Cancelar</button>
                                                                    <button type="submit" class="btn btn-primary">Borrar Producto</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-bs-toggle="modal" data-bs-target="#borrarModal{{$producto->id_producto}}">
                                                        <span class="material-symbols-outlined text-white">
                                                            delete
                                                        </span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection