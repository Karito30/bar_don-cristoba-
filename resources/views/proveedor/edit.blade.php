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
        <form action="{{ route('proveedor.update',$proveedor->ID_PROVEEDOR) }}" method="POST">
            @csrf
            @method('PUT')
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('success') }}
            </div>
            @endif
            <h1>ACTUALIZAR PROVEEDOR</h1>
            <div class="mb-3">
                <label for="NOMBRE_PROVEEDOR" class="form-label">NOMBRE PROVEEDOR</label>
                <input type="text" class="form-control @error('NOMBRE_PROVEEDOR') is-invalid @enderror" name="NOMBRE_PROVEEDOR" id="NOMBRE_PROVEEDOR" maxlength="50" value="{{$proveedor->NOMBRE_PROVEEDOR}}" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" title="Solo se permiten letras y espacios">
                <div class="invalid-feedback">
                    @error('NOMBRE_PROVEEDOR')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="DIRECCION_PROVEEDOR" class="form-label">DIRECCION PROVEEDOR</label>
                <input type="text" class="form-control @error('DIRECCION_PROVEEDOR') is-invalid @enderror" name="DIRECCION_PROVEEDOR" id="DIRECCION_PROVEEDOR" maxlength="50" value="{{$proveedor->DIRECCION_PROVEEDOR}}"  pattern="[A-Za-z0-9\s,'-]+" title="Ingresa una dirección válida" >
                <div class="invalid-feedback">
                    @error('DIRECCION_PROVEEDOR')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="TEL_PROVEEDOR" class="form-label">TELEFONO PROVEEDOR</label>
                <input type="number" class="form-control @error('TEL_PROVEEDOR') is-invalid @enderror" name="TEL_PROVEEDOR" id="TEL_PROVEEDOR" maxlength="10" value="{{$proveedor->TEL_PROVEEDOR}}" pattern="[0-9]+" title="Solo se permiten números">
                <div class="invalid-feedback">
                    @error('TEL_PROVEEDOR')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="ID_ROL_FK_PROVEEDOR">EMPLEADO</label>
                <select class="form-select @error('ID_ROL_FK_PROVEEDOR') is-invalid @enderror" name="ID_ROL_FK_PROVEEDOR" id="ID_ROL_FK_PROVEEDOR" required>
                    <option value="">~~Escoja el Empleado~~</option>
                    @foreach ($empleado as $empleado)
                        <option value="{{ $empleado->NOMBRE }}" @if($proveedor->ID_ROL_FK_PROVEEDOR == $empleado->ID) selected @endif>
                            {{ $empleado->NOMBRE }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    @error('ID_ROL_FK_PROVEEDOR')
                        {{$message}}
                    @enderror
                </div>
            <div class="mb-3">
                <input type="submit" value="Enviar" class="btn btn-success" id="submit">
            </div>
        </form>
    @endsection
</body>
</html>
