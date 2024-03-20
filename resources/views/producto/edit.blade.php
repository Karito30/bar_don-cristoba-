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
 
        <form action="{{ route('producto.update',$producto->ID_PRODUCTO) }}" method="POST">
            @csrf
        @method('PUT')
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ session('success') }}
        </div>
        @endif
        <h1>ACTUALIZAR PRODUCTO</h1>
            <div>
                <div>
                    <label for="NOM_PRODUCTO" class="form-label">NOMBRE PRODUCTO</label>
                    <input type="text" class="form-control @error('NOM_PRODUCTO') is-invalid @enderror" name="NOM_PRODUCTO" id="NOM_PRODUCTO" maxlength="50"  value="{{$producto->NOM_PRODUCTO}}" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" title="Solo se permiten letras y espacios">
                    <div class="invalid-feedback">
                        @error('NOM_PRODUCTO')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="VALOR_PRODUCTO" class="form-label">VALOR PRODUCTO</label>
                    <input type="number" class="form-control @error('VALOR_PRODUCTO') is-invalid @enderror" name="VALOR_PRODUCTO" id="VALOR_PRODUCTO" maxlength="50" value="{{$producto->VALOR_PRODUCTO}}" pattern="[0-9]+" title="Solo se permiten números">
                    <div class="invalid-feedback">
                        @error('VALOR_PRODUCTO')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="CATEGORIA_PRODUCTO" class="form-label">CATEGORIA PRODUCTO</label>
                    <select class="form-select @error('CATEGORIA_PRODUCTO') is-invalid @enderror" name="CATEGORIA_PRODUCTO" id="CATEGORIA_PRODUCTO" maxlength="10">
                        <option value="">~~Escoja la Categoria~~</option>
                        <option value="paquetes" {{$producto->CATEGORIA_PRODUCTO == 'paquetes' ? 'selected' : ''}}>Paquetes</option>
                        <option value="dulces" {{$producto->CATEGORIA_PRODUCTO == 'dulces' ? 'selected' : ''}}>Dulces</option>
                        <option value="gaseosas" {{$producto->CATEGORIA_PRODUCTO == 'gaseosas' ? 'selected' : ''}}>Gaseosas</option>
                        <option value="agua" {{$producto->CATEGORIA_PRODUCTO == 'agua' ? 'selected' : ''}}>Agua</option>
                        <option value="licor" {{$producto->CATEGORIA_PRODUCTO == 'licor' ? 'selected' : ''}}>Licor</option>
                        <option value="cervezas" {{$producto->CATEGORIA_PRODUCTO == 'cervezas' ? 'selected' : ''}}>Cervezas</option>
                    </select>
                    <div class="invalid-feedback">
                        @error('CATEGORIA_PRODUCTO')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="CANT_PRODUCTO" class="form-label">CANTIDAD PRODUCTO</label>
                    <input class="form-select @error('CANT_PRODUCTO') is-invalid @enderror" name="CANT_PRODUCTO" id="CANT_PRODUCTO" maxlength="2" value="{{$producto->CANTPRODUCTO}}" pattern="[0-9]+" title="Solo se permiten números">
                    <div class="invalid-feedback">
                        @error('CANT_PRODUCTO')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="ID_PROVEEDOR_FK_PRODUCTO">PROVEEDOR</label>
                    <select class="form-select @error('ID_PROVEEDOR_FK_PRODUCTO') is-invalid @enderror" name="ID_PROVEEDOR_FK_PRODUCTO" id="ID_PROVEEDOR_FK_PRODUCTO" >
                        <option value="">~~Escoja el Proveedor~~</option>
                        @foreach ($proveedor as $prov)
                            <option value="{{ $prov->NOMBRE_PROVEEDOR }}" @if($producto->ID_PROVEEDOR_FK_PRODUCTO == $prov->ID_PROVEEDOR_FK_PRODUCTO) selected @endif>
                                {{ $prov->NOMBRE_PROVEEDOR }}
                            </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        @error('ID_PROVEEDOR_FK_PRODUCTO')
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