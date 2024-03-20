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
   
        <form action="{{ route('empleado.update',$empleado->ID_ROL) }}" method="POST">
            @csrf
            @method('PUT')
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('success') }}
            </div>
            @endif
            <h1>ACTUALIZAR ROL</h1>
            @csrf
            <div>
                <label for="FECHA_NA_ROL" class="form-label">FECHA NACIMIENTO</label>
                <input type="date" class="form-control @error('FECHA_NA_ROL') is-invalid @enderror" name="FECHA_NA_ROL" id="FECHA_NA_ROL" value="{{$empleado->FECHA_NA_ROL}}">
                @error('FECHA_NA_ROL')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <label for="NOMBRE" class="form-label">NOMBRE</label>
                <input type="text" class="form-control @error('NOMBRE') is-invalid @enderror" name="NOMBRE" id="NOMBRE" value="{{$empleado->NOMBRE}}" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" title="Solo se permiten letras y espacios">
                @error('NOMBRE')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            
            <div>
                <label for="NOMBRE_ROL" class="form-label">ROL</label>
                <select class="form-select @error('NOMBRE_ROL') is-invalid @enderror" name="NOMBRE_ROL" id="NOMBRE_ROL">
                    <option value="">~Selecciona un cargo~</option>
                    <option value="admin" {{ $empleado->NOMBRE_ROL == 'Gerente' ? 'selected' : '' }}>Administrador</option>
                    <option value="empleado" {{ $empleado->NOMBRE_ROL == 'Asistente' ? 'selected' : '' }}>Empleado</option>
                    <option value="proveedor" {{ $empleado->NOMBRE_ROL == 'Técnico' ? 'selected' : '' }}>Proveedor</option>
                </select>
                @error('NOMBRE_ROL')
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
    
    
</body>
</html>