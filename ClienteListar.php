<?php

require_once 'conexionBD.php';
$conexion = new Conexion();
$cliente = $conexion->query('SELECT * FROM cliente', PDO::FETCH_ASSOC);
//eliminar por id

if (isset($_GET['opcion'])) {
    if ($_GET['opcion'] == 'eliminar') {

        try {
            $sql = 'DELETE FROM cliente ' . 'WHERE idcliente = :idcliente';

            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(':idcliente', $_GET['id']);

            $stmt->execute();

            header("Status: 301 Moved Permanently");
            header("Location: ClienteListar.php?mensaje=true");
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();

        }
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Listado de Clientes</title>
  </head>
  <body>
  <h1>Listado de Clientes</h1>
  <?php
if (isset($_GET['mensaje'])) {
    ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Exito</strong> Registro Eliminado
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <?php
}
?>

<div class="card" style="width: 60rem; margin:auto;">
    <div class="card-body">
        <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Carnet</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Eliminar</th>
                    <th scope="col">Editar</th>
                    </tr>
                </thead>
                <tbody>


                <?php
foreach ($cliente as $clienteItem) {
    ?>
                <tr>
                    <th scope="row"><?php echo $clienteItem['idcliente']; ?></th>
                    <td><?php echo $clienteItem['nombre']; ?></td>
                    <td><?php echo $clienteItem['edad']; ?></td>
                    <td><?php echo $clienteItem['telefono']; ?></td>
                    <td><?php echo $clienteItem['ci']; ?></td>
                    <td><?php echo $clienteItem['direccion']; ?></td>
                    <td><a href="ClienteListar.php?opcion=eliminar&id=<?php echo $clienteItem['idcliente']; ?>" class="btn btn-danger">Eliminar</a></td>
                    <td><a href="ClienteEditar.php?opcion=editar&id=<?php echo $clienteItem['idcliente']; ?>" class="btn btn-success">Editar</a></td>
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>