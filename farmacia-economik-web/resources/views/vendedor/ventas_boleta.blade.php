<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Boleta</title>
    <!-- Agrega el enlace al CDN de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid d-flex flex-column align-items-center justify-content-center min-vh-100 bg-light">
        <div class="row">
            <div class="col-12 d-flex justify-content-center py-4">
                <h1 class="text-center">Número de venta <span class="fw-bold">{{ $detallesVenta[0]->id_venta }}</span>
                </h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg">
                    <div class="row bg-white">
                        <div class="col-12 py-3">
                            <div class="card">
                                <div class="card-header text-center d-flex justify-content-center">
                                    <h3 class="mx-auto">------------------------------Detalle de la venta---------------------------</h3>
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Vendedor</th>
                                                <th>Metodo de compra</th>
                                                <th>Cliente</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="row">{{$venta->Usuarios->nombre}} {{$venta->Usuarios->apellido}}</div>
                                                    <div class="row">{{$venta->rut_usuario}}</div>
                                                </td>
                                                <td>
                                                    {{$venta->metodo_pago}}
                                                </td>
                                                <td>
                                                    <div class="row">{{$venta->Cliente->nombre}} {{$venta->Cliente->apellido}}</div>
                                                    <div class="row">{{$venta->rut_cliente}}</div>
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
                                                <td>{{ $detalle->id_producto }}</td>
                                                <td>{{ $detalle->cantidad }}</td>
                                                <td>${{ $detalle->precio }}</td>
                                                <td>${{ $detalle->total }}</td>
                                            </tr>
                                            @php
                                            $totalPagar += $detalle->total;
                                            @endphp
                                            @endforeach
                                            <!-- Nueva fila para mostrar el total -->
                                            <tr>
                                                <td colspan="3" class="fw-bold text-end">Total a pagar:</td>
                                                <td class="fw-bold">{{ $totalPagar }}</td>
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
    </div>
    <!-- Agrega el enlace al script de Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/boo