@extends('templates.master')

@section('contenido-principal')
<body style="background-color: #e9e5f3;">
    <div class="container-fluid d-flex flex-column justify-content-lg-center align-items-center">
        <div class="row">
            <div class="col-12 d-flex justify-content-center py-4">
                <h3>Ingreso de producto</h3>
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
                                    <div class="row">
                                        <div class="col-12 col-lg">
                                            <div class="mb-3">
                                                <label for="id_producto" class="form-label">Id Producto</label>
                                                <input type="text" id="id_producto" name="id_producto" class="form-control">
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="mb-3">
                                                    <label for="cantidad_producto" class="form-label">Cantidad</label>
                                                    <input type="number" id="cantidad_producto" name="cantidad_producto" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3 text-end">
                                                <button class="btn btn-light" type="submit">Enviar</button>
                                            </div>
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