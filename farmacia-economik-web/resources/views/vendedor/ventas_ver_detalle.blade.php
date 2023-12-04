@extends('templates.master')

@section('contenido-principal')

<body style="background-color: #e9e5f3;">
    <div class="container-fluid d-flex flex-column justify-content-lg-center align-items-center">
        <div class="row">
            <div class="col-12 d-flex justify-content-center py-4">
                <h3>Detalle de Venta Numero <span class="fw-bold"></span></h3>
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
                                                <th>ID Venta</th>
                                                <th>Producto</th>
                                                <th>Precio</th>
                                                <th>Cantidad</th>
                                                <th>Total</th>
                                                <th>Imprimir Boleta</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($detallesVenta as $detalle)
                                            <tr>
                                                <td>{{ $detalle->id_venta }} </td>
                                                <td>{{ $detalle->id_producto }}</td>
                                                <td>{{ $detalle->precio }} </td>
                                                <td> {{ $detalle->cantidad }} </td>
                                                <td>{{ $detalle->total }} </td>
                                                <td>
                                                    <a class="btn btn-success" href="{{route('imprimir_boleta',$detalle->id_venta)}}" target="_blank">
                                                        <span class="text-white">Imprimir Boleta</span>
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
            </div>
        </div>
</body>
@endsection