<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/proveedor/proveedor_delete.css') }}">
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="modal-delete-{{$proveedor->ID_PROVEEDOR}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('proveedor.destroy',$proveedor->ID_PROVEEDOR)}}" method="POST">
            @csrf
            @method('DELETE')   
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title " id="exampleModalLabel">ANULAR PROVEEDOR</h1>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Deseas Anular este proveedor
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerrar</button>
          <input type="submit" class="btn btn-danger btn-sm" value="Anular">
        </div>
      </div>
    </form>
    </div>
  </div>
</body>
</html>