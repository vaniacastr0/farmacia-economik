@extends('templates.master')

@section('contenido-principal')

<div class="container-fluid d-flex flex-column justify-content-lg-center align-items-center">
    <div class="row">
        <div class="col-12 d-flex justify-content-center py-4">
            <h3>Registros de ajustes</h3>
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
                                                <th>Id Ajuste</th>
                                                <th>Fecha</th>
                                                <th>Cantidad</th>
                                                <th>Motivo</th>
                                                <th>Producto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ajustes as $ajuste)
                                            <tr>
                                                <td>{{ $ajuste->id_ajuste}}</td>
                                                <td>{{ $ajuste->fecha }}</td>
                                                <td>{{ $ajuste->cantidad }}</td>
                                                <td>{{ $ajuste->motivo }}</td>
                                                <td>{{ $ajuste->Producto->nombre_producto}}</td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-lg-2  py-1">
                    <div class="mb-3 text-white">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{route('bodeguero.ajustes_filtrarajustes')}}">
                                    @method('POST')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="id_categoria" class="form-label">Filtrar productos</label>
                                    </div>
                                    <div class="mb-3">
                                        <select id="id_categoria" name="id_categoria" class="form-control">
                                            @foreach($productos as $producto)
                                            <option value="{{$producto->id_producto}}">{{$producto->nombre_producto}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col d-flex text-end">
                                            <div class="mb-3 px-0 ">
                                                <button class="btn btn-primary d-flex flex-column justify-content-center"
                                                    type="submit">Filtrar</button>
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
</div>
@endsection