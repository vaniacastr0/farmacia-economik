@extends('templates.master')

@section('contenido-principal')

<div class="container-fluid d-flex flex-column justify-content-lg-center align-items-center">
    <div class="row">
        <div class="col-12 d-flex justify-content-center py-4">
            <h3>Listado de productos en bodega</h3>
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
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{ $producto->id_producto }}</td>
                                            <td>{{ $producto->nombre_producto }}</td>
                                            <td>{{ $producto->stock_producto }}</td>
                                            <td>{{ $producto->Categoria->nombre }}</td>
                                            <td>
                                                @if($producto->stock_producto==0)
                                                <div class="col">
                                                    <a href="{{ route('bodeguero.ajustes_eliminarcantidadesproducto', $producto->id_producto) }}"
                                                        class="btn btn-danger text-white disabled"  aria-disabled="true">
                                                        <i class="material-symbols-outlined">delete</i>
                                                    </a>
                                                </div>
                                                @else
                                                <div class="col">
                                                    <a href="{{ route('bodeguero.ajustes_eliminarcantidadesproducto', $producto->id_producto) }}"
                                                        class="btn btn-danger text-white">
                                                        <i class="material-symbols-outlined">delete</i>
                                                    </a>
                                                </div>
                                                @endif
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
</div>
@endsection