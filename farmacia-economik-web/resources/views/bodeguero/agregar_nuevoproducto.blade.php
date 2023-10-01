@extends('templates.master')

@section('contenido-principal')
<body style="background-color: #e9e5f3;">
    <div class="container-fluid d-flex flex-column justify-content-lg-center align-items-center">
        <div class="row">
            <div class="col-12 d-flex justify-content-center py-4">
                <h3>Agregar nuevo producto </h3>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg">
                    <div class="row bg-white">
                        <div class="col-12  py-3 order-last order-lg-first">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{route('bodeguero.add_nuevoproducto')}}" method="POST" enctype="multipart/form-data">
                                        @method('POST')
                                        @csrf
                                        <div class="row">
                                                <div class="col-6 col-lg">
                                                    <div class="mb-3">
                                                        <label for="nombre" class="form-label">Nombre Producto</label>
                                                        <input type="text" id="nombre" name="nombre" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="elab" class="form-label">Fecha Elaboracion</label>
                                                        <input type="date" id="elab" name="elab" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="precio" class="form-label">Precio</label>
                                                        <input type="number" id="precio" name="precio" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-6 col-lg">
                                                    <div class="mb-3">
                                                        <label for="categoria" class="form-label">Categoria</label>
                                                        <select id="categoria" name="categoria" class="form-control">
                                                            @foreach($categorias as $categoria)
                                                            <option value="{{$categoria->id_categoria}}">{{$categoria->nombre}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="venc" class="form-label">Fecha Vencimiento</label>
                                                        <input type="date" id="venc" name="venc" class="form-control">
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3 text-end">
                                                    <button class="btn btn-primary" type="submit">Enviar</button>
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
</body>
@endsection