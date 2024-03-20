<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/venta/venta_create.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <title>Document</title>
</head>
<body>
    @extends('template.plantilla')
    @section('contenedor')
   
        <form action="{{ route('pedido.store') }}" method="POST">
            <h1>REGISTRAR PEDIDO</h1>
            @csrf

            <div>
                <label for="ID_PROVEEDOR_FK_PEDIDO_PROVEEDOR" class="form-label">PROVEEDOR</label>
                <select class="form-select @error('ID_PROVEEDOR_FK_PEDIDO_PROVEEDOR') is-invalid @enderror" name="ID_PROVEEDOR_FK_PEDIDO_PROVEEDOR" id="ID_PROVEEDOR_FK_PEDIDO_PROVEEDOR" >
                    <option value="">~~Escoja el Proveedor~~</option>
                     @foreach ($proveedor as $proveedor)
                     <option value="{{ $proveedor->NOMBRE_PROVEEDOR }}">{{ $proveedor->NOMBRE_PROVEEDOR }}</option>
                     @endforeach
                </select>
                @error('ID_PROVEEDOR_FK_PEDIDO_PROVEEDOR')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div>
                <label for="NOMBRE_PRODUCTO_FK_PEDIDO_PROVEEDOR" class="form-label">PRODUCTO</label>
                <select class="form-select @error('NOMBRE_PRODUCTO_FK_PEDIDO_PROVEEDOR') is-invalid @enderror" name="NOMBRE_PRODUCTO_FK_PEDIDO_PROVEEDOR" id="NOMBRE_PRODUCTO_FK_PEDIDO_PROVEEDOR" >
                    <option value="">~~Escoja el Producto~~</option>
                    @foreach ($producto as $producto)
                        <option value="{{ $producto->NOM_PRODUCTO }}">{{ $producto->NOM_PRODUCTO }}</option>
                    @endforeach
                </select>
                @error('NOMBRE_PRODUCTO_FK_PEDIDO_PROVEEDOR')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <label for="CANTIDAD" class="form-label">CANTIDAD</label>
                <input type="number" class="form-control @error('CANTIDAD') is-invalid @enderror" name="CANTIDAD" id="CANTIDAD" maxlength="5" min="1" onchange="calculateTotal()" pattern="[0-9]+" title="Solo se permiten números">
                @error('CANTIDAD')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <label for="PRECIO" class="form-label">PRECIO</label>
                <input type="number" class="form-control @error('PRECIO') is-invalid @enderror" name="PRECIO" id="PRECIO" maxlength="20" min="1" onchange="calculateTotal()" pattern="[0-9]+" title="Solo se permiten números">
                @error('PRECIO')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <label for="FECHA_PEDIDO" class="form-label">FECHA PEDIDO</label>
                <input type="date" class="form-control @error('FECHA_PEDIDO') is-invalid @enderror" name="FECHA_PEDIDO" id="FECHA_PEDIDO">
                @error('FECHA_PEDIDO')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <label for="SUBTOTAL" class="form-label">SUBTOTAL</label>
                <input type="number" class="form-control @error('SUBTOTAL') is-invalid @enderror" name="SUBTOTAL" id="SUBTOTAL" maxlength="5" min="1" readonly pattern="[0-9]+" title="Solo se permiten números">
                @error('SUBTOTAL')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <label for="TOTAL" class="form-label">TOTAL</label>
                <input type="number" class="form-control @error('TOTAL') is-invalid @enderror" name="TOTAL" id="TOTAL" maxlength="5" min="1" readonly pattern="[0-9]+" title="Solo se permiten números" >
                @error('TOTAL')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            
            <div>
                <input type="submit" value="Enviar" class="btn btn-success" id="submit">
            </div>
        </form>
    @endsection
    <script>
        function calculateTotal() {
            var cantidadInput = document.getElementById('CANTIDAD');
            var precioInput = document.getElementById('PRECIO');

            var cantidad = parseFloat(cantidadInput.value) || 0;
            var precio = parseFloat(precioInput.value) || 0;

            if (isNaN(cantidad) || cantidad <= 0) {
                alert('La cantidad debe ser un número mayor que cero.');
                cantidadInput.value = '';
                return;
            }

            if (isNaN(precio) || precio <= 0) {
                alert('El precio debe ser un número mayor que cero.');
                precioInput.value = '';
                return;
            }

            var subtotal = cantidad * precio;
            var total = subtotal;

            document.getElementById('SUBTOTAL').value = subtotal.toFixed(2);
            document.getElementById('TOTAL').value = total.toFixed(2);
        }

        $(document).ready(function() {
            function actualizarFechaMaxima() {
                var today = new Date().toISOString().split('T')[0];
                $('#FECHA_PEDIDO').val(today);

                $('#FECHA_PEDIDO').attr('min', today);

                var currentYear = new Date().getFullYear();
                var maxYear = currentYear + 1;
                $('#FECHA_PEDIDO').attr('max', maxYear + '-12-31');
            }

            actualizarFechaMaxima();

            $('#FECHA_PEDIDO').change(function() {
                actualizarFechaMaxima();
            });

            $('#CANTIDAD').change(function() {
                calculateTotal();
            });
        });
    </script>
</body>
</html>
