<?php
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=Gestion-Roles.xls");

echo '<meta charset="UTF-8">';
$conexion = mysqli_connect('localhost:3306', 'root', '', 'don_cristobal');
$consulta = "SELECT * FROM ROL;";
?>

<table border="1">
    <caption>GESTION ROLES</caption>
    <tr>
        <th>ID ROL</th>
        <th>FECHA NACIMIENTO</th>
        <th>NOMBRE</th>
        <th>ROL</th>
    </tr>

    <?php
    $resultado = mysqli_query($conexion, $consulta);

    while ($filas = mysqli_fetch_assoc($resultado)) {
        ?>
        <tr>
            <td><?php echo $filas["ID_ROL"]; ?></td>
            <td><?php echo $filas["FECHA_NA_ROL"]; ?></td>
            <td><?php echo $filas["NOMBRE"]; ?></td>
            <td><?php echo $filas["NOMBRE_ROL"]; ?></td>
        </tr>
    <?php } ?>
</table>
