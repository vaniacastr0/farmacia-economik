@extends('templates.master')

@section('contenido-principal')

<body style="background-color: #e9e5f3;">
    <div class="container-fluid d-flex flex-column justify-content-lg-center align-items-center">
        <div class="row">
            <div class="col-12 d-flex justify-content-center py-4">
                <h3>Listado de Productos</h3>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-2  py-1">
                    <div class="mb-3 text-white">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{route('bodeguero.mantencion_verproductosfiltrados')}}">
                                    @method('POST')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="id_categoria" class="form-label">Filtrar productos</label>
                                    </div>
                                    <div class="mb-3">
                                        <select id="id_categoria" name="id_categoria" class="form-control">
                                            @foreach($categorias as $categoria)
                                            <option value="{{$categoria->id_categoria}}">{{$categoria->nombre}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col d-flex text-end">
                                            <div class="mb-3 px-0 ">
                                                <button class="btn btn-primary d-flex flex-column justify-content-center"type="submit">Filtrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg">
                    <div class="row bg-white">
                        <div class="col-12  py-3 order-last order-lg-first">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre</th>
                                                <th>Stock</th>
                                                <th>Categoria</th>
                                                <th>Detalle</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productos as $producto)
                                            <tr>
                                                <td>{{ $producto->id_producto }}</td>
                                                <td>{{ $producto->nombre_producto }}</td>
                                                <td>{{ $producto->stock_producto }}</td>
                                                <td>{{ $producto->Categoria->nombre }}</td>
                                                <td> 
                                                    <div class="col">
                                                        <a href="{{route('bodeguero.mantencion_verproductodetalle', $producto->id_producto)}}"
                                                            class="btn btn-light">
                                                            <i class="material-symbols-outlined">info</i>
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