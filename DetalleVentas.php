<?php

require_once 'conexionBD.php';
$conexion = new Conexion();
$id = $_GET["id"];
$total = 0;
$detalle = $conexion->query("
SELECT idventas, articulos.nombre, articulos.precio, cantidad, total from detalleventa
inner join articulos on detalleventa.idarticulos=articulos.idarticulos WHERE detalleventa.idventas='$id';",
 PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Listado de Ventas</title>
  </head>
  <body>
  <h1>Listado de Ventas</h1>

<div class="card" style="width: 60rem; margin:auto;">
    <div class="card-body">
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






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="js/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>