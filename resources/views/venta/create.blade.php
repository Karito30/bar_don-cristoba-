<!DOCTYPE html>
<html lang="es">
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
   
        <form action="{{ route('venta.store') }}" method="POST">
            <h1>REGISTRAR VENTA</h1>
            @csrf
            <div>
                <label for="FECHA_VENTA" class="form-label">FECHA VENTA</label>
                <input type="date" class="form-control @error('FECHA_VENTA') is-invalid @enderror" name="FECHA_VENTA" id="FECHA_VENTA">
                @error('FECHA_VENTA')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <label for="VALOR_VENTA" class="form-label">VALOR VENTA</label>
                <input type="number" class="form-control @error('VALOR_VENTA') is-invalid @enderror" name="VALOR_VENTA" id="VALOR_VENTA" maxlength="5" min="1"  pattern="[0-9]+" title="Solo se permiten números">
                @error('VALOR_VENTA')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <label for="IVA_VENTA" class="form-label">IVA VENTA</label>
                <input type="number" class="form-control @error('IVA_VENTA') is-invalid @enderror" name="IVA_VENTA" id="IVA_VENTA" maxlength="5" min="1">
                @error('IVA_VENTA')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <label for="CANT_VENTA" class="form-label">CANTIDAD VENTA</label>
                <input type="number" class="form-control @error('CANT_VENTA') is-invalid @enderror" name="CANT_VENTA" id="CANT_VENTA" maxlength="5" min="1" pattern="[0-9]+" title="Solo se permiten números">
                @error('CANT_VENTA')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <label for="MESA" class="form-label">MESA</label>
                <select class="form-select @error('MESA') is-invalid @enderror" name="MESA" id="MESA">
                    <option value="">~~Seleccione una mesa~~</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
                @error('MESA')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div>
                <label for="ID_ROL_FK_VENTA" class="form-label">EMPLEADO</label>
                <select class="form-select @error('ID_ROL_FK_VENTA') is-invalid @enderror" name="ID_ROL_FK_VENTA" id="ID_ROL_FK_VENTA">
                    <option value="">~~Escoja el Empleado~~</option>
                    @foreach ($empleado as $empleado)
                        <option value="{{ $empleado->NOMBRE }}">
                            {{ $empleado->NOMBRE }}
                        </option>
                    @endforeach
                </select>
                @error('ID_ROL_FK_VENTA')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <label for="ID_PRODUCTO_FK_VENTA" class="form-label">PRODUCTO</label>
                <select class="form-select @error('ID_PRODUCTO_FK_VENTA') is-invalid @enderror" name="ID_PRODUCTO_FK_VENTA" id="ID_PRODUCTO_FK_VENTA">
                    <option value="">~~Escoja el Producto~~</option>                 
                    @foreach ($productos as $producto)
    <option value="{{ $producto->NOM_PRODUCTO }}">
        {{ $producto->NOM_PRODUCTO }}
    </option>
@endforeach
</select>
@error('ID_PRODUCTO_FK_VENTA')
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror
</div>
<div>
    <label for="ID_METODO_PAGO_FK_VENTA" class="form-label">METODO PAGO</label>
    <select class="form-select @error('ID_METODO_PAGO_FK_VENTA') is-invalid @enderror" name="ID_METODO_PAGO_FK_VENTA" id="ID_METODO_PAGO_FK_VENTA">
        <option value="">~~Escoja el Metodo de pago~~</option>
        <option value="Efectivo">Efectivo</option>
        <option value="Nequi">Nequi</option>
        <option value="Daviplata">Daviplata</option>
    </select>
    @error('ID_METODO_PAGO_FK_VENTA')
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
$(document).ready(function() {
    function actualizarFechaMaxima() {
        // Obtener la fecha actual en formato yyyy-mm-dd
        var today = new Date().toISOString().split('T')[0];
        // Establecer la fecha actual en el campo de fecha
        $('#FECHA_VENTA').val(today);

        // Configurar la fecha mínima en el campo de fecha para evitar fechas pasadas
        $('#FECHA_VENTA').attr('min', today);

        // Calcular el año actual y establecerlo como el año máximo permitido
        var currentYear = new Date().getFullYear();
        var maxYear = currentYear + 1; // Puedes ajustar esto según tus necesidades
        $('#FECHA_VENTA').attr('max', maxYear + '-12-31');
    }

    // Llamar a la función al cargar la página
    actualizarFechaMaxima();

    // Agregar evento de cambio al campo de fecha
    $('#FECHA_VENTA').change(function() {
        // Actualizar la fecha máxima cuando cambia la fecha
        actualizarFechaMaxima();
    });

    // Establecer el IVA predeterminado
    $('#IVA_VENTA').val(19);
});
</script>

</body>
</html>
