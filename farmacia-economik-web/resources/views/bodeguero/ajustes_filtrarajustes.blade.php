@extends('templates.master')

@section('contenido-principal')
<body style="background-color: #e9e5f3;">
    <div class="container-fluid d-flex flex-column justify-content-lg-center align-items-center">
        <div class="row">
            <div class="col-12 d-flex justify-content-center py-4">
                <h3>Listado de ajuste de {{$producto->nombre_producto}}</h3>
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
                                                <th>Id Ajuste</th>
                                                <th>Fecha</th>
                                                <th>Cantidad</th>
                                                <th>Motivo</th>
                                                <th>Producto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ajustes as $ajuste)
                                            <tr>
                                                <td>{{ $ajuste->id_ajuste }}</td>
                                                <td>{{ $ajuste->fecha }}</td>
                                                <td>{{ $ajuste->cantidad }}</td>
                                                <td>{{ $ajuste->motivo }}</td>
                                                <td>{{ $nombre_producto }}</td>
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
            <div class="row mt-3">
                <div class="col-12 col-lg-2">
                    <a href="javascript:history.back()" class="btn btn-secondary">Volver</a>
                </div>
                
            </div>
        </div>
</body>
@endsection