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
    //header("Status: 301 Moved Permanently");
      //      header("Location: ClienteListar.php");
      echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=ClienteListar.php?mensaje=true'> </head>";

}
require_once 'include/header.php';
?>

    
<div class="masthead">
<div class="card" style="width: 18rem; margin:auto;">
    <div class="card-body">
<div class="h3 text-center">Editar cliente</div>
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
</div>
<?php require_once 'include/footer.php'; ?>