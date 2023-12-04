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
                                <th>ID Venta</th>
                                <th>Fecha</th>
                                <th>Metodo Pago</th>
                                <th>Usuario</th>
                                <th>Cliente</th>
                                <th>Detalle</th>
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
                                <td>
                                    <div class="col">
                                        <a href="#"
                                            class="btn btn-light " aria-disabled="true">
                                            <i class="material-symbols-outlined">info</i>
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