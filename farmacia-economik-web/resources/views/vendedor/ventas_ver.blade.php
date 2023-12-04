@extends('templates.master')

@section('contenido-principal')

<div class="container p-5">
    <div class="row pb-2">
        <div class="col col-lg-12 d-flex  justify-content-center py-4">
            <h1 class="">Listado de Ventas</h1>
        </div>
    </div>
    <div class="container">
        <div class="row bg-white">
            <div class="col-12 order-last order-lg-first"></div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Venta</th>
                                <th>Fecha</th>
                                <th>Método Pago</th>
                                <th>Usuario</th>
                                <th>Cliente</th>
                                <th>Total</th>
                                <th>Boleta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ventas as $venta)
                            <tr>
                                <td>{{ $venta->id_venta }}</td>
                                <td>{{ $venta->fecha }}</td>
                                <td>{{ $venta->metodo_pago }}</td>
                                <td>{{ $venta->Usuarios->nombre }} {{ $venta->Usuarios->apellido }}</td>
                                <td>{{ $venta->Cliente->nombre }} {{ $venta->Cliente->apellido }}</td>
                                <td>${{ $venta->total_venta}}</td>
                                <td>
                                    <div class="col">
                                        <a class="btn btn-light" href="{{ route('imprimir_boleta', $venta->id_venta) }}" target="_blank">
                                            <span class="material-symbols-outlined">download</span>
                                        </a>
                                    </div>
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