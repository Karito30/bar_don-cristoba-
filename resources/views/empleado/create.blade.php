<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/venta/venta_create.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
    
    <title>Document</title>
</head>
<body>
    @extends('template.plantilla')
    @section('contenedor')
        <form id="registroForm" action="{{ route('empleado.store') }}" method="POST">
            <h1>REGISTRAR ROL</h1>
            @csrf
            <div class="mb-3">
                <label for="FECHA_NA_ROL" class="form-label">FECHA NACIMIENTO</label>
                <input type="date" class="form-control" name="FECHA_NA_ROL" id="FECHA_NA_ROL">
                @error('FECHA_NA_ROL')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="NOMBRE" class="form-label">NOMBRE</label>
                <input type="text" class="form-control" name="NOMBRE" id="NOMBRE" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" title="Solo se permiten letras y espacios">
                @error('NOMBRE')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="NOMBRE_ROL" class="form-label">ROL</label>
                <select class="form-select" name="NOMBRE_ROL" id="NOMBRE_ROL">
                    <option value="">Selecciona un rol</option>
                    <option value="admin">Administrador</option>
                    <option value="empleado">Empleado</option>
                    <option value="proveedor">Proveedor</option>
                </select>
                @error('NOMBRE_ROL')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div>
                <input type="submit" value="Enviar" class="btn btn-success" id="submit">
            </div>
        </form>
    @endsection
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
