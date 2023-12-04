@extends('templates.master')

@section('contenido-principal')

<body style="background-color: #e9e5f3;">
    <div class="container-fluid d-flex flex-column justify-content-lg-center align-items-center">
        <div class="row">
            <div class="col-12 d-flex justify-content-center py-4">
                <h3>¡Venta Número <span class="fw-bold">{{$idVenta}}</span> Realizada con éxito!</h3>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg">
                    <div class="row bg-white">
                        <div class="col-12  py-3 order-last order-lg-first">
                            <div class="card">
                                <div class="card-heard  text-center d-flex justify-content-center">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Venta</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                <th>Imprimir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="fs-5">Número {{$idVenta}}</td>
                                                <td class="fs-5">{{$venta->fecha}}</td>
                                                <td class="fs-5">{{$venta->hora}}</td>
                                                <td>
                                                    <div class="col">
                                                        <a class="btn btn-light" href="{{ route('imprimir_boleta', $idVenta) }}" target="_blank">
                                                            Imprimir Boleta
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $totalPagar = 0;
                                            @endphp
                                            @foreach ($detallesVenta as $detalle)
                                            <tr>
                                                <td>
                                                    <?php
                                                        $nombreProducto = DB::table('productos')->where('id_producto', $detalle->id_producto)->value('nombre_producto');
                                                    ?>
                                                    {{ $nombreProducto }}
                                                </td>
                                                <td>{{ $detalle->cantidad }}</td>
                                                <td>${{ $detalle->precio }}</td>
                                                <td>${{ $detalle->total }}</td>
                                            </tr>
                                            @php
                                            $totalPagar += $detalle->total;
                                            @endphp
                                            @endforeach
                                            <tr>
                                                <td colspan="3" class="fw-bold text-end">Total a pagar: </td>
                                                <td class="fw-bold"> ${{ $totalPagar }}</td>
                                            </tr>
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