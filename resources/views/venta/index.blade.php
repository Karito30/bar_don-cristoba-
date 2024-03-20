<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/venta/venta.css') }}">
</head>
<body>
   @extends('template.plantilla')
  @section('contenedor')
  
  <h1 style="color: #fff;">GESTION VENTA</h1>
      
<hr>
<div class="d-md-flex justify-content-md-end">
    <form action="{{ route('venta.index')}}" method="GET">
        <div class="btn-group">
            <input type="text" name="busqueda" class="form-control" placeholder="Busqueda">
            <input type="submit" value="Consultar" class="btn btn-primary">
        </div>
    </form>
</div>
<br>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
  </svg>
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    {{ session('success') }}
</div>
@endif
@if(session('danger'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#check-circle-fill"/></svg>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    {{ session('danger') }}
</div>
@endif


    <a href="{{ route('venta.create')}}" class="btn btn-primary">Registrar Venta</a>
    @can('venta.excel_venta')
    <form action="excel_venta" enctype="multipart/form-data" class="btn-group">
        <button class="btn btn-success">Excel</button>
</form>
@endcan
@can('venta.pdf')
<form action="{{ route('venta.pdf')}}" enctype="multipart/form-data" class="btn-group">
    <button class="btn btn-success">Pdf</button>
</form>

@endcan
<hr>
    <table class="table">
        <div class="col-xl-12">
            <div class="table-responsive">
                <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>FECHA</th>
            <th>VALOR</th>
            <th>IVA</th>
            <th>CANTIDAD</th>
            <th>MESA</th>
            <th>ROL</th>
            <th>PRODUCTO</th>
            <th>METODO PAGO</th>
            <th>OPCIONES</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
                <tr>
                    <td>{{$venta->ID_VENTA}}</td>
                    <td>{{$venta->FECHA_VENTA}}</td>
                    <td>{{$venta->VALOR_VENTA}}</td>
                    <td>{{$venta->IVA_VENTA}}</td>
                    <td>{{$venta->CANT_VENTA}}</td>
                    <td>{{$venta->MESA}}</td>
                    <td>{{$venta->ID_ROL_FK_VENTA}}</td>
                    <td>{{$venta->ID_PRODUCTO_FK_VENTA}}</td>
                    <td>{{$venta->ID_METODO_PAGO_FK_VENTA}}</td>
                    <td class="btn-group">
                        @can('venta.edit')
                      
                        <a href="{{ route('venta.edit', $venta->ID_VENTA) }}" class="btn btn-warning">Actualizar</a>
                        @endcan
                        @can('venta.destroy')
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$venta->ID_VENTA}}">
                            @method('DELETE')
                            @csrf
                            Anular
                        </button>
                        @include('venta.delete')
                        @endcan
                            
                      
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">{{ $ventas->appends(['busqueda'=>$busqueda]) }}</td>
            </tr>
        </tfoot>
    </table>
    @endsection
</div>
    </div>
        </div>
</body>
</html>