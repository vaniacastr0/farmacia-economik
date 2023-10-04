@extends('templates.master')

@section('contenido-principal')
<div class="container-fluid d-flex flex-column justify-content-lg-center align-items-center">
    <div class="row">
        <div class="col-12 d-flex justify-content-center py-4">
            <h3>Actualizar Producto</h3>
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
                                            <th>Stock</th>
                                            <th>Categoria</th>
                                            <th>Actualizar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{ $producto->id_producto }}</td>
                                            <td>{{ $producto->nombre_producto }}</td>
                                            <td>{{ $producto->stock_producto }}</td>
                                            <td>{{ $producto->Categoria->nombre }}</td>
                                            <td><div class="col">
                                                <a href="{{ route('bodeguero.mantencion_actualizarproducto', $producto->id_producto) }}"
                                                    class="btn btn-light">
                                                    <i class="material-symbols-outlined">edit</i>
                                                </a>
                                            </div></td>
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