<?php 

echo '<meta charset="UTF-8">';
$conexion=mysqli_connect('localhost:3306','root','', 'don_cristobal');
$consulta="SELECT * FROM  pedido_proveedor;";
header("content-Type: application/vnd.ms-excel charset=iso-8859-1");
header("content-Disposition: attachment; filename=Gestion-Pedidos.xls");


?>
<table border="1">
    <caption>GESTION PEDIDOS</caption>
    <tr>
        <th>ID PEDIDO</th>
        <th>NOMBRE PROVEEDOR</th>
        <th>NOMBRE PRODUCTO</th>
        <th>CANTIDAD</th>
        <th>PRECIO</th>
        <th>FECHA PEDIDO</th>
        <th>SUBTOTAL</th>
        <th>TOTAL</th>
    </tr>

    <?php 
    $resultado=mysqli_query($conexion, $consulta);

    while ($filas=mysqli_fetch_assoc($resultado))
    {?>
      <tr>
        <td><?php  echo $filas["ID_PEDIDO_PROVEEDOR"]; ?></td>
        <td><?php  echo $filas["ID_PROVEEDOR_FK_PEDIDO_PROVEEDOR"]; ?></td>
        <td><?php  echo $filas["NOMBRE_PRODUCTO_FK_PEDIDO_PROVEEDOR"]; ?></td>
        <td><?php  echo $filas["CANTIDAD"]; ?></td>
        <td><?php  echo $filas["PRECIO"]; ?></td>
        <td><?php  echo $filas["FECHA_PEDIDO"]; ?></td>
        <td><?php  echo $filas["SUBTOTAL"]; ?></td>
        <td><?php  echo $filas["TOTAL"]; ?></td>
       </tr>
       <?php } ?>
</table>