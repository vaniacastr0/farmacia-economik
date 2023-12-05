@extends('templates.master')

@section('contenido-principal')

<body>
    <div class="d-flex justify-content-center mt-4" style="min-height: 100vh;">
        <div class="container">
            <div class="row mt-6"> 
                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="col">
                                <div class="row">
                                    <h5 class="card-title text-start pb-2">Productos Ingresados</h5>
                                </div>
                                <div class="row">
                                    <div class="col-1 px-2">
                                        <i class="fas fa-box fa-2x"></i> 
                                    </div>
                                    <div class="col-11 text-start">
                                        <h2>{{$numero_filas}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="col">
                                <div class="row">
                                    <h5 class="card-title text-start pb-2">Stock Actual</h5>
                                </div>
                                <div class="row">
                                    <div class="col-1 px-2">
                                        <i class="fas fa-trash-alt fa-2x"></i>
                                    </div>
                                    <div class="col-11 text-start">
                                        <h2>{{$stock_actual}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-6">
                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="col">
                                <div class="row">
                                    <h5 class="card-title text-start pb-2">Ajustes Hechos</h5>
                                </div>
                                <div class="row">
                                    <div class="col-1 px-2">
                                        <i class="fas fa-clipboard-check fa-2x"></i>
                                    </div>
                                    <div class="col-11 text-start">
                                        <h2>{{$listado_ajustes}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="col">
                                <div class="row">
                                    <h5 class="card-title text-start pb-2">Cuentas Activas</h5>
                                </div>
                                <div class="row">
                                    <div class="col-1 px-2">
                                        <i class="fas fa-user fa-2x"></i>
                                    </div>
                                    <div class="col-11 text-start">
                                        <h2>{{$cuentas_activas}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-6">
                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="col">
                                <div class="row">
                                    <h5 class="card-title text-start pb-2">Ingresos Hechos</h5>
                                </div>
                                <div class="row">
                                    <div class="col-1 px-2">
                                        <i class="fas fa-clipboard-check fa-2x"></i>
                                    </div>
                                    <div class="col-11 text-start">
                                        <h2>{{$listado_ajustes}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-6">
                <div class="col">
                    <div class="card">
                        <div class="card-header text-center">
                            <h5 class="card-title">Productos con Stock Crítico</h5>
                        </div>
                        <div class="card-body">
                            <table class="table  table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>PRODUCTO</th>
                                        <th>CATEGORÍA</th>
                                        <th>PRECIO</th>
                                        <th>STOCK ACTUAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productosStockCritico as $productos)
                                    <tr>
                                        <td>{{ $productos->id_producto}}</td>
                                        <td>{{ $productos->nombre_producto}}</td>
                                        <td>{{ $productos->Categoria->nombre}}</td>
                                        <td>{{ $productos->precio_producto}}</td>
                                        <td>{{ $productos->stock_producto}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection