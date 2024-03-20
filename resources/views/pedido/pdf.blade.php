<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/venta/venta_pdf.css') }}">
  </head>
<style>
   body {
            font-family: 'Times New Roman', Times, serif;
        }

        .cabecera {
            background-color: black;
            color: white;
        }

        table {
            text-align: center;
            font-size: 15px;
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
        }

        h1 {
            color: black;
            text-align: center;
        }

        img {
            width: 100px;
            height: 100px;
            display: block;
            margin: 0 auto;
        }

</style>
    <body>
        <img src="{{ public_path('css/diseño_web/imagen/d.png') }}" alt="">

        <h1>GESTION PEDIDO</h1><br>
        <table class="table ">
        <thead class="cabecera">
            <th>ID PEDIDO</th>
            <th>NOMBRE PROVEEDOR</th>
            <th>NOMBRE PRODUCTO</th>
            <th>CANTIDAD</th>
            <th>PRECIO</th>
            <th>FECHA PEDIDO</th>
            <th>SUBTOTAL</th>
            <th>TOTAL</th>
        </thead>
        <tbody>
            @foreach ($pedido as $pedido)
                <tr>
                    <td>{{$pedido->ID_PEDIDO_PROVEEDOR}}</td>
                    <td>{{$pedido->ID_PROVEEDOR_FK_PEDIDO_PROVEEDOR}}</td>
                    <td>{{$pedido->NOMBRE_PRODUCTO_FK_PEDIDO_PROVEEDOR}}</td>
                    <td>{{$pedido->CANTIDAD}}</td>
                    <td>{{$pedido->PRECIO}}</td>
                    <td>{{$pedido->FECHA_PEDIDO}}</td>
                    <td>{{$pedido->SUBTOTAL}}</td>
                    <td>{{$pedido->TOTAL}}</td>>

                </tr>
            @endforeach
        </tbody>
    </table>
  </body>
</html>