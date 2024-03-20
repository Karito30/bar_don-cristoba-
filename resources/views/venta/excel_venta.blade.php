<?php

echo '<meta charset="UTF-8">';
$conexion=mysqli_connect('localhost:3306','root','', 'don_cristobal');
$consulta="SELECT * FROM venta;";
header("content-Type: application/vnd.ms-excel charset=iso-8859-1");
header("content-Disposition: attachment; filename=Gestion-venta.xls");


?>
<table border="1">
    <caption>GESTION VENTAS</caption>
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
    </tr>

    <?php 
    $resultado=mysqli_query($conexion, $consulta);

    while ($filas=mysqli_fetch_assoc($resultado))
    {?>
      <tr>
        <td><?php  echo $filas["ID_VENTA"]; ?></td>
        <td><?php  echo $filas["FECHA_VENTA"]; ?></td>
        <td><?php  echo $filas["VALOR_VENTA"]; ?></td>
        <td><?php  echo $filas["IVA_VENTA"]; ?></td>
        <td><?php  echo $filas["CANT_VENTA"]; ?></td>
        <td><?php  echo $filas["MESA"]; ?></td>
        <td><?php  echo $filas["ID_ROL_FK_VENTA"]; ?></td>
        <td><?php  echo $filas["ID_PRODUCTO_FK_VENTA"]; ?></td>
        <td><?php  echo $filas["ID_METODO_PAGO_FK_VENTA"]; ?></td>
       </tr>
       <?php } ?>
</table>