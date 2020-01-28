<?php

require_once 'conexionBD.php';
$conexion = new Conexion();
$ventas = $conexion->query('
SELECT ventas.idventas, ventas.fecha, cliente.nombre, ventas.subtotal, ventas.total FROM ventas 
inner join cliente on ventas.idcliente=cliente.idcliente;',
 PDO::FETCH_ASSOC);
//eliminar por id

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
                    <th scope="col">ID</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">SubTotal</th>
                    <th scope="col">total</th>
                    <th scope="col">Detalle</th>
                    </tr>
                </thead>
                <tbody>


                <?php
foreach ($ventas as $ventasItem) {
    ?>
                <tr>
                    <th scope="row"><?php echo $ventasItem['idventas']; ?></th>
                    <td><?php echo $ventasItem['fecha']; ?></td>
                    <td><?php echo $ventasItem['nombre']; ?></td>
                    <td><?php echo $ventasItem['subtotal']; ?></td>
                    <td><?php echo $ventasItem['total']; ?></td>
                    <td><a href="DetalleVentas.php?id=<?php echo $ventasItem['idventas']; ?>" class="btn btn-success">Detalle</a></td>
                    </tr>
                <?php
}
?>
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