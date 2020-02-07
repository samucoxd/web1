<?php

require_once 'conexionBD.php';
$conexion = new Conexion();
$ventas = $conexion->query(
  '
SELECT ventas.idventas, ventas.fecha, cliente.nombre, ventas.subtotal, ventas.total FROM ventas 
inner join cliente on ventas.idcliente=cliente.idcliente;',
  PDO::FETCH_ASSOC
);
//eliminar por id
require_once 'include/header.php';
?>
<div class="masthead">
  <div class="card" style="width: 60rem; margin:auto;">
    <div class="card-body">
      <div class="h3 text-center">Listado de Ventas</div>
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

</div>




<?php require_once 'include/footer.php'; ?>