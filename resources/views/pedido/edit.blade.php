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
   
        <form action="{{ route('pedido.update',$pedido->ID_PEDIDO_PROVEEDOR) }}" method="POST">
            @csrf
            @method('PUT')
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('success') }}
            </div>
            @endif
            <h1>ACTUALIZAR PEDIDO</h1>
            <div class="mb-3">
                <label for="ID_PROVEEDOR_FK_PEDIDO_PROVEEDOR" class="form-label">PROVEEDOR</label>
                <select class="form-select @error('ID_PROVEEDOR_FK_PEDIDO_PROVEEDOR') is-invalid @enderror" name="ID_PROVEEDOR_FK_PEDIDO_PROVEEDOR" id="ID_PROVEEDOR_FK_PEDIDO_PROVEEDOR" >
                    <option value="">~~Escoja el Proveedor~~</option>
                     @foreach ($proveedor as $proveedor)
                     <option value="{{ $proveedor->NOMBRE_PROVEEDOR }}" @if($proveedor->ID_PROVEEDOR == $pedido->ID_PROVEEDOR_FK_PEDIDO_PROVEEDOR) selected @endif>
                        {{ $proveedor->NOMBRE_PROVEEDOR }}
                    </option>
                     @endforeach
                </select>
                @error('ID_PROVEEDOR_FK_PEDIDO_PROVEEDOR')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="NOMBRE_PRODUCTO_FK_PEDIDO_PROVEEDOR" class="form-label">PRODUCTO</label>
                <select class="form-select @error('NOMBRE_PRODUCTO_FK_PEDIDO_PROVEEDOR') is-invalid @enderror" name="NOMBRE_PRODUCTO_FK_PEDIDO_PROVEEDOR" id="NOMBRE_PRODUCTO_FK_PEDIDO_PROVEEDOR" >
                    <option value="">~~Escoja el Producto~~</option>
                    @foreach ($producto as $producto)
                        <option value="{{ $producto->NOM_PRODUCTO }}" @if($producto->ID_PRODUCTO == $pedido->NOMBRE_PRODUCTO_FK_PEDIDO_PROVEEDOR) selected @endif>
                            {{ $producto->NOM_PRODUCTO }}
                        </option>
                    @endforeach
                </select>
                @error('NOMBRE_PRODUCTO_FK_PEDIDO_PROVEEDOR')
                <div class="invalid-feedback">
                {{$message}}
                </div>
                 @enderror
            </div>
            <div class="mb-3">
                <label for="CANTIDAD" class="form-label">CANTIDAD</label>
                <input type="number" class="form-control @error('CANTIDAD') is-invalid @enderror" name="CANTIDAD" id="CANTIDAD" maxlength="5" min="1" onchange="calculateTotal()" value="{{$pedido->CANTIDAD}}" pattern="[0-9]+" title="Solo se permiten números">
                @error('CANTIDAD')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="PRECIO" class="form-label">PRECIO</label>
                <input type="number" class="form-control @error('PRECIO') is-invalid @enderror" name="PRECIO" id="PRECIO" maxlength="20" min="1" onchange="calculateTotal()" value="{{$pedido->PRECIO}}" pattern="[0-9]+" title="Solo se permiten números">
                @error('PRECIO')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="FECHA_PEDIDO" class="form-label">FECHA PEDIDO</label>
                <input type="date" class="form-control @error('FECHA_PEDIDO') is-invalid @enderror" name="FECHA_PEDIDO" id="FECHA_PEDIDO" value="{{$pedido->FECHA_PEDIDO}}">
                @error('FECHA_PEDIDO')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="SUBTOTAL" class="form-label">SUBTOTAL</label>
                <input type="number" class="form-control @error('SUBTOTAL') is-invalid @enderror" name="SUBTOTAL" id="SUBTOTAL" maxlength="5" min="1" readonly value="{{$pedido->SUBTOTAL}}" pattern="[0-9]+" title="Solo se permiten números">
                @error('SUBTOTAL')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="TOTAL" class="form-label">TOTAL</label>
                <input type="number" class="form-control @error('TOTAL') is-invalid @enderror" name="TOTAL" id="TOTAL" maxlength="5" min="1" readonly value="{{$pedido->TOTAL}}" pattern="[0-9]+" title="Solo se permiten números">
                @error('TOTAL')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            
            <div>
                <input type="submit" value="Enviar" class="btn btn-seccess" id="submit">
            </div>
        </form>
    @endsection
    <script>
   
   function calculateTotal() {
    // Obtener los valores de cantidad y precio
    var cantidadInput = document.getElementById('CANTIDAD');
    var precioInput = document.getElementById('PRECIO');

    var cantidad = parseFloat(cantidadInput.value) || 0;
    var precio = parseFloat(precioInput.value) || 0;

    // Validar la cantidad
    if (isNaN(cantidad) || cantidad <= 0) {
        alert('La cantidad debe ser un número mayor que cero.');
        cantidadInput.value = '';  // Limpiar el campo
        return;
    }

    // Validar el precio
    if (isNaN(precio) || precio <= 0) {
        alert('El precio debe ser un número mayor que cero.');
        precioInput.value = '';  // Limpiar el campo
        return;
    }

    // Calcular el subtotal y el total
    var subtotal = cantidad * precio;
    var total = subtotal; // Puedes ajustar esto basándote en factores adicionales si es necesario

    // Mostrar los resultados en los campos correspondientes
    document.getElementById('SUBTOTAL').value = subtotal.toFixed(2);
    document.getElementById('TOTAL').value = total.toFixed(2);
}

    
        $(document).ready(function() {
            function actualizarFechaMaxima() {
                // Obtener la fecha actual en formato yyyy-mm-dd
                var today = new Date().toISOString().split('T')[0];
                // Establecer la fecha actual en el campo de fecha
                $('#FECHA_PEDIDO').val(today);
    
                // Configurar la fecha mínima en el campo de fecha para evitar fechas pasadas
                $('#FECHA_PEDIDO').attr('min', today);
    
                // Calcular el año actual y establecerlo como el año máximo permitido
                var currentYear = new Date().getFullYear();
                var maxYear = currentYear + 1; // Puedes ajustar esto según tus necesidades
                $('#FECHA_PEDIDO').attr('max', maxYear + '-12-31');
            }
    
            // Llamar a la función al cargar la página
            actualizarFechaMaxima();
    
            // Agregar evento de cambio al campo de fecha
            $('#FECHA_PEDIDO').change(function() {
                // Actualizar la fecha máxima cuando cambia la fecha
                actualizarFechaMaxima();
            });
    
            // Agregar evento de cambio al campo de cantidad
            $('#CANTIDAD').change(function() {
                // Recalcular total cuando cambia la cantidad
                calculateTotal();
            });
        });
    </script>
     
</body>
</html>