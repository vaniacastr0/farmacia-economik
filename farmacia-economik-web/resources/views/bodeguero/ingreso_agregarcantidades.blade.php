@extends('templates.master')

@section('contenido-principal')

<body style="background-color: #e9e5f3;">
    <div class="container-fluid d-flex flex-column justify-content-lg-center align-items-center">
        <div class="row">
            <div class="col-12 d-flex justify-content-center py-4">
                <h3>Ingreso de Mercaderia</h3>
            </div>
        </div>
    </div>
    <!-- contenido principal -->
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg">
                <div class="row bg-white">
                    <div class="col-12  py-3 order-last order-lg-first">
                        <!-- formulario -->
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('bodeguero.ingreso_agregarcantidadespost')}}" method="POST" enctype="multipart/form-data">
                                    @method('POST')
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-lg">
                                            <div class="mb-3">
                                                <label for="producto" class="form-label">Producto</label>
                                                <select id="producto" name="producto" class="form-control">
                                                    @foreach($productos as $producto)
                                                    <option value="{{$producto->id_producto}}">
                                                        {{$producto->nombre_producto}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="mb-3">
                                                    <label for="cantidad" class="form-label">Cantidad</label>
                                                    <input type="number" id="cantidad" name="cantidad"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3 text-end">
                                                <button class="btn btn-light" type="submit">Agregar Mercaderia</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection