<?php

echo '<meta charset="UTF-8">';
$conexion=mysqli_connect('localhost:3306','root','', 'don_cristobal');
$consulta="SELECT * FROM proveedor;";
header("content-Type: application/vnd.ms-excel charset=iso-8859-1");
header("content-Disposition: attachment; filename=Gestion-Proveedor.xls");

?>
<table>
    <caption>GESTION PROVEEDORES</caption>
    <tr>
        <th>ID Proveedor</th>
        <th>Nombre Proveedor</th>
        <th>Dirección Proveedor</th>
        <th>Teléfono Proveedor</th>
        <th>Id empleado</th>
    </tr>

    <?php 
    $resultado=mysqli_query($conexion, $consulta);

    while ($filas=mysqli_fetch_assoc($resultado))
    {?>
      <tr>
        <td><?php  echo $filas["ID_PROVEEDOR"]; ?></td>
        <td><?php  echo $filas["NOMBRE_PROVEEDOR"]; ?></td>
        <td><?php  echo $filas["DIRECCION_PROVEEDOR"]; ?></td>
        <td><?php  echo $filas["TEL_PROVEEDOR"]; ?></td>
        <td><?php  echo $filas["ID_EMPLEADO_FK_PROVEEDOR"]; ?></td>
       </tr>
       <?php } ?>
</table>