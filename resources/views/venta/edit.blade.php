<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/venta/venta_create.css') }}">
</head>
<body>
    @extends('template.plantilla')
    @section('contenedor')
    <form action="{{route('venta.update',$venta->ID_VENTA)}}" method="POST">
        @csrf
        @method('PUT')
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ session('success') }}
        </div>
        @endif
        <h1>ACTUALIZAR VENTA</h1>
        <div>
            <label for="FECHA_VENTA" class="form-label">FECHA VENTA</label>
            <input type="date" class="form-control @error('FECHA_VENTA') is-invalid @enderror" name="FECHA_VENTA" id="FECHA_VENTA" value="{{ $venta->FECHA_VENTA }}">
            @error('FECHA_VENTA')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="VALOR_VENTA" class="form-label">VALOR VENTA</label>
            <input type="number" class="form-control @error('VALOR_VENTA') is-invalid @enderror" name="VALOR_VENTA" id="VALOR_VENTA" value="{{ $venta->VALOR_VENTA }}" maxlength="5" min="1" pattern="[0-9]+" title="Solo se permiten números">
            @error('VALOR_VENTA')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="IVA_VENTA" class="form-label">IVA VENTA</label>
            <input type="number" class="form-control @error('IVA_VENTA') is-invalid @enderror" name="IVA_VENTA" id="IVA_VENTA" value="{{ $venta->IVA_VENTA }}" maxlength="5" min="1" readonly>
            @error('IVA_VENTA')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="CANT_VENTA" class="form-label">CANTIDAD VENTA</label>
            <input type="number" class="form-control @error('CANT_VENTA') is-invalid @enderror" name="CANT_VENTA" id="CANT_VENTA" value="{{ $venta->CANT_VENTA }}" maxlength="5" min="1" pattern="[0-9]+" title="Solo se permiten números">
            @error('CANT_VENTA')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="MESA" class="form-label">MESA</label>
            <select class="form-select @error('MESA') is-invalid @enderror" name="MESA" id="MESA">
                <option value="">~~Seleccione una mesa~~</option>
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}" {{ $venta->MESA == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
            @error('MESA')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="ID_ROL_FK_VENTA" class="form-label">EMPLEADO</label>
            <select class="form-select @error('ID_ROL_FK_VENTA') is-invalid @enderror" name="ID_ROL_FK_VENTA" id="ID_ROL_FK_VENTA">
                <option value="">~~Escoja el Empleado~~</option>
                @foreach ($empleado as $empleado)
                    <option value="{{ $empleado->NOMBRE }}" {{ $venta->ID_ROL_FK_VENTA == $empleado->id ? 'selected' : '' }}>
                        {{ $empleado->NOMBRE }}
                    </option>
                @endforeach
            </select>
            @error('ID_ROL_FK_VENTA')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="ID_PRODUCTO_FK_VENTA" class="form-label">PRODUCTO</label>
            <select class="form-select @error('ID_PRODUCTO_FK_VENTA') is-invalid @enderror" name="ID_PRODUCTO_FK_VENTA" id="ID_PRODUCTO_FK_VENTA">
                <option value="">~~Escoja el Producto~~</option>                 
                @foreach ($productos as $producto)
                    <option value="{{ $producto->NOM_PRODUCTO }}" {{ $venta->ID_PRODUCTO_FK_VENTA == $producto->id ? 'selected' : '' }}>
                        {{ $producto->NOM_PRODUCTO }}
                    </option>
                @endforeach
            </select>
            @error('ID_PRODUCTO_FK_VENTA')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="ID_METODO_PAGO_FK_VENTA" class="form-label">METODO PAGO</label>
            <select class="form-select @error('ID_METODO_PAGO_FK_VENTA') is-invalid @enderror" name="ID_METODO_PAGO_FK_VENTA" id="ID_METODO_PAGO_FK_VENTA">
                <option value="">~~Escoja el Metodo de pago~~</option>
                <option value="Efectivo" {{ $venta->ID_METODO_PAGO_FK_VENTA == 'Efectivo' ? 'selected' : '' }}>Efectivo</option>
                <option value="Nequi" {{ $venta->ID_METODO_PAGO_FK_VENTA == 'Nequi' ? 'selected' : '' }}>Nequi</option>
                <option value="Daviplata" {{ $venta->ID_METODO_PAGO_FK_VENTA == 'Daviplata' ? 'selected' : '' }}>Daviplata</option>
            </select>
            @error('ID_METODO_PAGO_FK_VENTA')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
             
        <div>
            <input type="submit" value="Enviar" class="btn btn-success">
        </div>
    </form>
    @endsection
   <script>
    $(document).ready(function() {
        function actualizarFechaMaxima() {
            var today = new Date().toISOString().split('T')[0];
            $('#FECHA_VENTA').val(today).attr('min', today);

            var maxYear = new Date().getFullYear() + 1;
            $('#FECHA_VENTA').attr('max', maxYear + '-12-31');
        }

        // Llamar a la función al cargar la página y al cambiar la fecha
        actualizarFechaMaxima();
        $('#FECHA_VENTA').change(actualizarFechaMaxima);

        // Establecer el IVA predeterminado
        $('#IVA_VENTA').val(19);
    });
</script>
</body>
</html>
