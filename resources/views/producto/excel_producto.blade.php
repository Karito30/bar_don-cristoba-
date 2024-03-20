<?php 

echo '<meta charset="UTF-8">';
$conexion=mysqli_connect('localhost:3306','root','', 'don_cristobal');
$consulta="SELECT * FROM  producto;";
header("content-Type: application/vnd.ms-excel charset=iso-8859-1");
header("content-Disposition: attachment; filename=Gestion-Producto.xls");


?>
<table border="1">
    <caption>GESTION PRODUCTOS</caption>
    <tr>
        <th>id_producto</th>
        <th>Nombre producto</th>
        <th>valor producto</th>
        <th>categoria producto</th>
        <th>cantidad producto</th>
        <th>id_proveedor</th>
    </tr>

    <?php 
    $resultado=mysqli_query($conexion, $consulta);

    while ($filas=mysqli_fetch_assoc($resultado))
    {?>
      <tr>
        <td><?php  echo $filas["ID_PRODUCTO"]; ?></td>
        <td><?php  echo $filas["NOM_PRODUCTO"]; ?></td>
        <td><?php  echo $filas["VALOR_PRODUCTO"]; ?></td>
        <td><?php  echo $filas["CATEGORIA_PRODUCTO"]; ?></td>
        <td><?php  echo $filas["CANT_PRODUCTO"]; ?></td>
        <td><?php  echo $filas["ID_PROVEEDOR_FK_PRODUCTO"]; ?></td>
       </tr>
       <?php } ?>
</table>