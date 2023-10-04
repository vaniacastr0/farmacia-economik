@extends('templates.master')

@section('contenido-principal')
<body style="background-color: #e9e5f3;">
    <div class="container-fluid d-flex flex-column justify-content-lg-center align-items-center">
        <div class="row">
            <div class="col-12 d-flex justify-content-center py-4">
                <h3>Listado de Productos</h3>
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
                                                <th>Detalle</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productos as $producto)
                                            <tr>
                                                <td>{{ $producto->id_producto }}</td>
                                                <td>{{ $producto->nombre_producto }}</td>
                                                <td>{{ $producto->stock_producto }}</td>
                                                <td>{{ $nombre_categoria }}</td>
                                                <td> 
                                                    <div class="col">
                                                        <a href="#"
                                                            class="btn btn-light">
                                                            <i class="material-symbols-outlined">info</i>
                                                        </a>
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
</body>
@endsection