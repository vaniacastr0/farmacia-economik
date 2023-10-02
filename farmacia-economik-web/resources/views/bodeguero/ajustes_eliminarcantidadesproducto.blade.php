@extends('templates.master')

@section('contenido-principal')
<body style="background-color: #e9e5f3;">
    <div class="container d-flex justify-content-center align-items-center mt-3 mb-3 pt-3">
        <div class="row">
            <div class="col">
                <div>
                    <h3>Ajuste de productos</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid  d-flex flex-column justify-content-center">
        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 col-lg-6 text-center mt-3">
                                    <h5 class="card-title">Producto</h5>
                                    <p class="card-text">
                                        <li>{{$producto->nombre_producto}}</li>
                                    </p>
                                </div>
                                <div class="col-12 col-lg-6 text-center mt-3">
                                    <h5 class="card-title">Stock Actual</h5>
                                    <p class="card-text">
                                        <li>{{$producto->stock_producto}}</li>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                                <form action="{{route('bodeguero.ajuste_crearajuste',$producto->id_producto)}}" method="POST">
                                    @method('POST')
                                    @csrf
                                    <div class="row">
                                        <div class="col-8 mb-2 text-center">
                                            <h5>Motivo de ajuste</h5>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="motivo" name="motivo">
                                            </div>
                                        </div>
                                        <div class="col-4 mb-2 text-center">
                                            <h5>Cantidad a eliminar</h5>
                                            <div class="form-group">
                                                <input type="number" class="form-control" id="ajuste" name="ajuste">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col text-end mt-3">
                                            <button class="btn btn-light" type="submit">Enviar</button>
                                        </div>
                                    </div>
                                </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection