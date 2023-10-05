@extends('templates.master')

@section('contenido-principal')
<body style="background-color: #e9e5f3;">
    <div class="container-fluid d-flex flex-column justify-content-lg-center align-items-center">
        <div class="row">
            <div class="col-12 d-flex justify-content-center py-4">
                <h3>Actualizacion del producto <span class="fw-bold">{{$producto->nombre_producto}}</span></h3>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg">
                    <div class="row bg-white">
                        <div class="col-12  py-3 order-last order-lg-first">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{route('bodeguero.mantencion_actualizarproductopost',$producto->id_producto)}}" method="POST" enctype="multipart/form-data">
                                        @method('POST')
                                        @csrf
                                        @include('validated.messages')
                                        <div class="row">
                                                <div class="col-6 col-lg">
                                                    <div class="mb-3">
                                                        <label for="nombre" class="form-label">Nombre Producto</label>
                                                        <input type="text" id="nombre" name="nombre" class="form-control" value="{{$producto->nombre_producto}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="precio" class="form-label">Precio</label>
                                                        <input type="number" id="precio" name="precio" class="form-control" value="{{$producto->precio_producto}}">
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg">
                                                    <div class="mb-3">
                                                        <label for="categoria" class="form-label">Categoria</label>
                                                        <select id="categoria" name="categoria" class="form-control">
                                                            @foreach($categorias as $categoria)
                                                            <option value="{{$categoria->id_categoria}}"@if($categoria->id_categoria == $producto->id_categoria) selected @endif>{{$categoria->nombre}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3 text-end">
                                                    <button class="btn btn-primary" type="submit">Actualizar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-lg-2">
                            <a href="javascript:history.back()" class="btn btn-secondary">Volver</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
</body>
@endsection