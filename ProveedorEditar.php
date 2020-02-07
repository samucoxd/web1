<?php

require_once 'conexionBD.php';
$conexion = new Conexion();


//eliminar por id

if (isset($_GET['opcion'])) {
    if ($_GET['opcion'] == 'editar') {

        $proveedor = $conexion->query('SELECT * FROM proveedor WHERE idproveedor='.$_GET["id"].'', PDO::FETCH_ASSOC);

    }
}

if (isset($_POST['editar'])) {

    $sentencia = $conexion->prepare("UPDATE proveedor SET 
    nombre=:nombre,
    pais=:pais
    WHERE idproveedor=:idproveedor");

    $sentencia->bindParam(':nombre', $_POST['nombre']);
    $sentencia->bindParam(':pais', $_POST['pais']);
    $sentencia->bindParam(':idproveedor', $_POST['idproveedor']);

    $sentencia->execute();
   // header("Status: 301 Moved Permanently");
     //       header("Location: ProveedorListar.php");
     echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=ProveedorListar.php?mensaje=true'> </head>";

}
require_once 'include/header.php';
?>
<div class="masthead">
<div class="card" style="width: 18rem; margin:auto;">
    <div class="card-body">
        <div class="h3 tex-center">Editar Proveedor</div>
    <form method="POST" action="#">
        <?php 
            foreach ($proveedor as $proveedorItem) {
        ?>
        <div class="form-group">
            <label for="exampleInputEmail1">ID</label>
            <input type="text" value="<?php echo $proveedorItem['idproveedor']; ?>" name="idproveedor" readonly  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nombre</label>
            <input type="text" value="<?php echo $proveedorItem['nombre']; ?>" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Pais</label>
            <input type="text" value="<?php echo $proveedorItem['pais']; ?>" name="pais" class="form-control" id="exampleInputPassword1" required>
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