@extends('templates.master')
@section('contenido-principal')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">

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
                    <div class="card-header">
                        <form action="{{ route('vendedor.filtrar_categorias') }}" method="GET" class="d-flex">
                            <input name="buscarpor" class="form-control me-2" type="search"
                                placeholder="Buscar producto" aria-label="Search">
                            <button type="submit" class="btn btn-light">Buscar</button>
                        </form>
                    </div>
                    <div class="card-body ps-0 pr-0">
                        <table class="table table-striped table-hover" id="tablaOriginal">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Categoría</th>
                                    <th>Cantidad</th>
                                    <th>Agregar</th>
                                </tr>
                            <tbody>
                                @foreach ($productos_filtrados as $producto)
                                <tr>
                                    <td>{{$producto->id_producto}}</td>
                                    <td>{{$producto->nombre_producto}}</td>
                                    <td>{{$producto->precio_producto}}</td>
                                    <td>{{$producto->stock_producto}}</td>
                                    <td>{{$producto->Categoria->nombre}}</td>
                                    <td>
                                        <div style="max-width: 50px;" class="mb-3">
                                            <input type="number" class="form-control form-control-sm" id="cantidad"
                                                name="cantidad" placeholder="0" min="1">
                                        </div>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-success agregarFila">
                                            <i class="material-icons text-white fs-6">shopping_cart</i>
                                        </button>
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
                        <table class="table table-striped table-hover" id="tablaDestino">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <div class="card-footer">
                            <form id="formularioVenta"  action="{{ route('vendedor.agregar_producto') }}" method="POST">
                                @csrf
                                <!-- Campos ocultos para enviar datos al controlador -->
                                <input type="hidden" name="datosTabla" id="datosTabla" value="">
                                <input type="hidden" name="cliente" id="clienteSeleccionado" value="">
                                <input type="hidden" name="metodoPago" id="metodoPagoSeleccionado" value="">
                                <input type="hidden" name="vendedor" id="vendedorSeleccionado" value="">

                                <div class="row">
                                    <div class="col-8">
                                        <div id="totalVenta" class="fw-bold fs-5"> </div>
                                    </div>
                                    <div class="col-4">
                                        <button type="button" class="btn btn-success" id="FinalizarCompra">
                                            <span class="text-white">Finalizar Compra</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        function calcularTotal() {
            var total = 0;
            // Itera sobre las filas de la tabla destino y suma los valores de la columna "Total"
            $("#tablaDestino tbody tr").each(function () {
                var totalFila = parseFloat($(this).find("td:eq(4)").text());
                total += totalFila;
            });
            // Muestra el total en algún lugar de tu vista
            $("#totalVenta").text("Total Venta: $" + total.toFixed(2));
        }
        $(".agregarFila").on("click", function () {
            // Encuentra la fila más cercana en la tabla original
            var filaOriginal = $(this).closest("tr");
            // Copia los datos de la fila original
            var id = filaOriginal.find("td:eq(0)").text();
            var producto = filaOriginal.find("td:eq(1)").text();
            var precio = parseInt(filaOriginal.find("td:eq(2)").text());
            var cantidad = parseInt(filaOriginal.find("td:eq(5)").find("input").val());

            if (!isNaN(cantidad) && cantidad > 0) {
                var total = precio * cantidad;
                // Crea una nueva fila en la tabla de destino
                var filaDestino = $("<tr>")
                    .append($("<td>").text(id))
                    .append($("<td>").text(producto))
                    .append($("<td>").text(precio))
                    .append($("<td>").text(cantidad))
                    .append($("<td>").text(total));
                // Agrega la nueva fila a la tabla de destino
                $("#tablaDestino tbody").append(filaDestino);
                // Desactiva el botón en la tabla original
                $(this).prop("disabled", true);
                filaOriginal.find("input[name='cantidad']").prop("disabled", true);
                calcularTotal();
            } else {

            }
        });
        $("#FinalizarCompra").on("click", function () {
            // Obtener datos de la tabla destino
            var datosTabla = [];
            $("#tablaDestino tbody tr").each(function () {
                var fila = {
                    id: $(this).find("td:eq(0)").text(),
                    producto: $(this).find("td:eq(1)").text(),
                    precio: $(this).find("td:eq(2)").text(),
                    cantidad: $(this).find("td:eq(3)").text(),
                    total: $(this).find("td:eq(4)").text()
                };
                datosTabla.push(fila);
            });

            // Obtener valores de los combobox
            var clienteSeleccionado = $("#cliente").val();
            var metodoPagoSeleccionado = $("#metodo_pago").val();
            var vendedorSeleccionado = "{{ auth()->user()->rut }}";

            // Actualizar campos ocultos en el formulario
            $("#datosTabla").val(JSON.stringify(datosTabla));
            $("#clienteSeleccionado").val(clienteSeleccionado);
            $("#metodoPagoSeleccionado").val(metodoPagoSeleccionado);
            $("#vendedorSeleccionado").val(vendedorSeleccionado);

            // Enviar formulario al controlador
            $("#formularioVenta").submit();
        });
        calcularTotal();
    });
</script>

@endsection