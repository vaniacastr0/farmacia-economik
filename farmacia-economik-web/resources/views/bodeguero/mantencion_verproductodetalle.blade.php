@extends('templates.master')

@section('contenido-principal')

<body style="background-color: #e9e5f3;">
    <div class="container-fluid d-flex flex-column justify-content-lg-center align-items-center">
        <div class="row">
            <div class="col-12 d-flex justify-content-center pt-4">
                <h3>Detalle de <span class="fw-bold">{{$producto->nombre_producto}}</span></h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h5>Codigo: {{$producto->id_producto}}</h5>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg">
                    <div class="row bg-white">
                        <div class="col-12  py-3 order-last order-lg-first">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 col-lg">
                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Nombre Producto</label>
                                                <input type="text" id="nombre" name="nombre" class="form-control"
                                                    placeholder="{{$producto->nombre_producto}}" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label for="precio" class="form-label">Precio</label>
                                                <input type="number" id="precio" name="precio" class="form-control"
                                                    placeholder="{{$producto->precio_producto}}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg">
                                            <div class="mb-3">
                                                <label for="categoria" class="form-label">Categoria</label>
                                                <input type="text" id="categoria" name="categoria" class="form-control"
                                                    placeholder="{{$producto->Categoria->nombre}}" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label for="stockTotal" class="form-label">Stock Actual</label>
                                                <input type="text" id="stockTotal" name="stockTotal" class="form-control"
                                                    placeholder="{{$producto->stock_producto}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row bg-white">
                        <div class="col-12  py-3 order-last order-lg-first">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Fecha Vencimiento</th>
                                                <th>Fecha Elaboracion</th>
                                                <th>Stock Ingresado</th>
                                                <th>Actualizar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($detalle_producto as $detalle)
                                            <tr>
                                                <td>{{ $detalle->id_detalle_producto}}</td>
                                                <td>{{ $detalle->fecha_venc }}</td>
                                                <td>{{ $detalle->fecha_elab }}</td>
                                                <td>{{ $detalle->stock }}</td>
                                                <td>
                                                    <div class="col">
                                                        <a href="{{route('bodeguero.mantencion_verproductodetalle_actualizar', $detalle->id_detalle_producto)}}"
                                                            class="btn btn-light " aria-disabled="true">
                                                            <i class="material-symbols-outlined">update</i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
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