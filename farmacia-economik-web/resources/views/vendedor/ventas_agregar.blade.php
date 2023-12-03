@extends('templates.master')
@section('contenido-principal')

<div class="container p-5">
    <div class="row pb-2">
        <div class="col col-lg-12 d-flex justify-content-center py-4 ">
            <h1 class="">Proceso de Venta</h1>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <!-- Card 1 -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Categoría</th>
                                    <th>Agregar</th>
                                </tr>
                            <tbody>
                                @foreach ($productos_con_stock as $producto)
                                <tr>
                                    <td>{{$producto->id_producto}}</td>
                                    <td>{{$producto->nombre_producto}}</td>
                                    <td>{{$producto->precio_producto}}</td>
                                    <td>{{$producto->Categoria->nombre}}</td>
                                    <td>{{$producto->stock_producto}}</td>
                                    <td>
                                        <a class="btn btn-success" href="#">
                                            <span
                                                class="material-symbols-outlined material-icons text-white fs-6">shopping_cart</span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="col-12 col-lg">
                            <div class="row">
                                <div class="col-5">
                                    <div class="mb-3">
                                        <label for="cliente" class="form-label">Cliente</label>
                                        <select id="cliente" name="cliente" class="form-control">
                                            @foreach($clientes as $cliente)
                                            <option value="{{$cliente->rut}}">
                                                {{$cliente->rut}} - {{$cliente->nombre}} {{$cliente->apellido}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-5">
                                        <label for="metodo_pago" class="form-label">Método de Pago</label>
                                        <select class="form-control" id="metodo_pago" name="metodo_pago">
                                            <option selected value="Efectico">Efectivo</option>
                                            <option value="Débito">Débito</option>
                                            <option selected value="Credito">Credito</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-5">
                                        <label for="vendedor" class="form-label">Vendedor</label>
                                        <input type="text" id="vendedor" name="vendedor" class="form-control"
                                            value="{{ auth()->user()->nombre }} {{ auth()->user()->apellido }}"
                                            disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                </tr>
                            <tbody>
                                
                            </tbody>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-lg-2 px-4">
            <a href="javascript:history.back()" class="btn btn-secondary">Volver</a>
        </div>

    </div>
</div>
@endsection