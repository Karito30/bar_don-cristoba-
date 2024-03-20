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
 
    <form action="{{ route('proveedor.store') }}" method="POST">
        <h1>REGISTRAR PROVEEDOR</h1>
        @csrf
        <div>
            <label for="NOMBRE_PROVEEDOR" class="form-label">NOMBRE PROVEEDOR</label>
            <input type="text" class="form-control @error('NOMBRE_PROVEEDOR') is-invalid @enderror" name="NOMBRE_PROVEEDOR" id="NOMBRE_PROVEEDOR" maxlength="50" pattern="[A-Za-z ]+" title="Solo letras y espacios permitidos">
            <div class="invalid-feedback">
                @error('NOMBRE_PROVEEDOR')
                    {{$message}}
                @enderror
            </div>
        </div>
        <div>
            <label for="DIRECCION_PROVEEDOR" class="form-label">DIRECCION PROVEEDOR</label>
            <input type="text" class="form-control @error('DIRECCION_PROVEEDOR') is-invalid @enderror" name="DIRECCION_PROVEEDOR" id="DIRECCION_PROVEEDOR" maxlength="50" pattern="[A-Za-z0-9\s,'-]+" title="Ingresa una dirección válida" >
            <div class="invalid-feedback">
                @error('DIRECCION_PROVEEDOR')
                    {{$message}}
                @enderror
            </div>
        </div>
        <div>
            <label for="TEL_PROVEEDOR" class="form-label">TELEFONO PROVEEDOR</label>
            <input type="number" class="form-control @error('TEL_PROVEEDOR') is-invalid @enderror" name="TEL_PROVEEDOR" id="TEL_PROVEEDOR" maxlength="10" pattern="[0-9]+" title="Solo se permiten números">
            <div class="invalid-feedback">
                @error('TEL_PROVEEDOR')
                    {{$message}}
                @enderror
            </div>
        </div>
        <div>
            <label for="ID_ROL_FK_PROVEEDOR" class="form-label">NOMBRE EMPLEADO</label>
            <select class="form-select @error('ID_ROL_FK_PROVEEDOR') is-invalid @enderror" name="ID_ROL_FK_PROVEEDOR" id="ID_ROL_FK_PROVEEDOR" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" title="Solo se permiten letras y espacios">
                <option value="">~~Escoja el Empleado~~</option>
                @foreach ($empleado as $empleado)
                    <option value="{{ $empleado->NOMBRE }}">
                        {{ $empleado->NOMBRE }}
                    </option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                @error('ID_ROL_FK_PROVEEDOR')
                    {{$message}}
                @enderror
            </div>
        </div>
            <div>
                <input type="submit" value="Enviar" class="btn btn-seccess" id="submit">
            </div>
        </form>
    @endsection
</body>
</html>