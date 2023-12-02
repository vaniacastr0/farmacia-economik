@extends('templates.master')

@section('contenido-principal')

<div class="container-fluid d-flex flex-column justify-content-lg-center align-items-center">
    <div class="row">
        <div class="col-12 d-flex justify-content-center py-4">
            <h3>Registros de Ingresos</h3>
        </div>
    </div>
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-9 col-lg">
                    <div class="row bg-white">
                        <div class="col-12  py-3 order-last order-lg-first">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Id Ingreso</th>
                                                <th>Fecha del ingreso</th>
                                                <th>Cantidad</th>
                                                <th>Producto</th>
                                                <th>Usuario</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ingresos as $ingreso)
                                            <tr>
                                                <td>{{ $ingreso->id_ingreso}}</td>
                                                <td>{{ $ingreso->fecha }}</td>
                                                <td>{{ $ingreso->cantidad }}</td>
                                                <td>{{ $ingreso->Producto->nombre_producto }}</td>
                                                <td>{{ $ingreso->Usuario->nombre }} {{$ingreso->Usuario->apellido}}</td>
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
    </div>
</div>
@endsection