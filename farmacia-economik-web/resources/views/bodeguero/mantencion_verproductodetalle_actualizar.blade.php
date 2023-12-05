@extends('templates.master')

@section('contenido-principal')

<body style="background-color: #e9e5f3;">
    <div class="container-fluid d-flex flex-column justify-content-lg-center align-items-center">
        <div class="row">
            <div class="col-12 d-flex justify-content-center py-4">
                <h3>Actualizacion de Ingreso</h3>
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
                                <form action="{{route('bodeguero.mantencion_verproductodetalle_actualizar_post',[$detalle_producto->id_detalle_producto,$detalle_producto->id_producto])}}" method="POST" enctype="multipart/form-data">
                                    @method('POST')
                                    @csrf
                                    @include('validated.messages')
                                    <div class="row">
                                        <div class="col-12 col-lg">
                                            <div class="col-12 col-lg">
                                                <div class="mb-3">
                                                    <label for="id_ingreso" class="form-label">Ingreso</label>
                                                    <input type="text" id="id_ingreso" name="id_ingreso"
                                                        class="form-control" value="{{$detalle_producto->id_detalle_producto}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="mb-3">
                                                    <label for="elab" class="form-label">Fecha Elaboracion</label>
                                                    <input type="date" id="elab" name="elab"
                                                        class="form-control" value="{{$detalle_producto->fecha_elab}}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="mb-3">
                                                    <label for="venc" class="form-label">Fecha Vencimiento</label>
                                                    <input type="date" id="venc" name="venc"
                                                        class="form-control" value="{{$detalle_producto->fecha_venc}}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <div class="mb-3">
                                                    <label for="cantidad" class="form-label">Cantidad</label>
                                                    <input type="number" id="cantidad" name="cantidad"
                                                        class="form-control" value="{{$detalle_producto->stock}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3 text-end">
                                                <button class="btn btn-light" type="submit">Actualizar Ingreso</button>
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