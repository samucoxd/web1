<?php

require_once 'conexionBD.php';
$conexion = new Conexion();


//eliminar por id

if (isset($_GET['opcion'])) {
    if ($_GET['opcion'] == 'editar') {

        $cliente = $conexion->query('SELECT * FROM cliente WHERE idcliente='.$_GET["id"].'', PDO::FETCH_ASSOC);

    }
}

if (isset($_POST['editar'])) {

    $sentencia = $conexion->prepare("UPDATE cliente SET 
    nombre=:nombre,
    edad=:edad,
    telefono=:telefono,
    ci=:ci,
    direccion=:direccion 
    WHERE idcliente=:idcliente");

    $sentencia->bindParam(':nombre', $_POST['nombre']);
    $sentencia->bindParam(':edad', $_POST['edad']);
    $sentencia->bindParam(':telefono', $_POST['telefono']);
    $sentencia->bindParam(':ci', $_POST['ci']);
    $sentencia->bindParam(':direccion', $_POST['direccion']);
    $sentencia->bindParam(':idcliente', $_POST['idcliente']);

    $sentencia->execute();
    header("Status: 301 Moved Permanently");
            header("Location: ClienteListar.php");

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

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Registro de Clientes</h1>

    <?php
if (isset($_GET['mensaje'])) {
    ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Exito</strong> Registro con Exito
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <?php
}
?>

<div class="card" style="width: 18rem; margin:auto;">
    <div class="card-body">
    <form method="POST" action="#">
        <?php 
            foreach ($cliente as $clienteItem) {
        ?>
        <div class="form-group">
            <label for="exampleInputEmail1">ID</label>
            <input type="text" value="<?php echo $clienteItem['idcliente']; ?>" name="idcliente" readonly  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nombre</label>
            <input type="text" value="<?php echo $clienteItem['nombre']; ?>" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Edad</label>
            <input type="text" value="<?php echo $clienteItem['edad']; ?>" name="edad" class="form-control" id="exampleInputPassword1" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Telefono</label>
            <input type="text" value="<?php echo $clienteItem['telefono']; ?>" name="telefono" class="form-control" id="exampleInputPassword1" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Carnet</label>
            <input type="text" value="<?php echo $clienteItem['ci']; ?>" name="ci" class="form-control" id="exampleInputPassword1" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">direccion</label>
            <input type="text" value="<?php echo $clienteItem['direccion']; ?>" name="direccion" class="form-control" id="exampleInputPassword1" required>
        </div>
                <input type="hidden" name="editar" value="editar">
        <button type="submit" class="btn btn-primary">Grabar    </button>
        <a href="index.html" class="btn btn-danger"> Cancelar</a>
    <?php
    }
    ?>

    </form>

    </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
