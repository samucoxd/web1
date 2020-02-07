<?php

require_once 'conexionBD.php';
$conexion = new Conexion();
$id = $_GET["id"];
$total = 0;
$detalle = $conexion->query("
SELECT idventas, articulos.nombre, articulos.precio, cantidad, total from detalleventa
inner join articulos on detalleventa.idarticulos=articulos.idarticulos WHERE detalleventa.idventas='$id';",
 PDO::FETCH_ASSOC);
 require_once 'include/header.php';
?>
<div class="masthead">
<div class="card" style="width: 60rem; margin:auto;">
    <div class="card-body">
      <div class="h3 text-center">Detalle de Venta</div>
        <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Venta</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">total</th>
                    </tr>
                </thead>
                <tbody>


                <?php
foreach ($detalle as $detalleItem) {
    ?>
                <tr>
                    <th scope="row"><?php echo $detalleItem['idventas']; ?></th>
                    <td><?php echo $detalleItem['nombre']; ?></td>
                    <td><?php echo $detalleItem['precio']; ?></td>
                    <td><?php echo $detalleItem['cantidad']; ?></td>
                    <td><?php echo $detalleItem['total']; ?></td>
                    
                    </tr>
                <?php
                $total = $total + $detalleItem['total'];
}
?>
                <td colspan="5" style="text-align:right"><h2>Total: <?php echo $total; ?> BS.</h2></td>
                </tbody>
            </table>
            <a href="index.php" class="btn btn-primary btn-block">Volver a Inicio</a>

                </div>
                </div>
                </div>

<?php  require_once 'include/footer.php'; ?>