<?php

require_once 'conexionBD.php';
$conexion = new Conexion();


if (isset($_GET['opcion'])) {
    if ($_GET['opcion'] == 'editar') {
        $categoria = $conexion->query('SELECT * FROM categoria WHERE idcategoria=' . $_GET["id"] . '', PDO::FETCH_ASSOC);
    }
}

if (isset($_POST['editar'])) {

    try {
        $sentencia = $conexion->prepare("UPDATE categoria SET 
    nombre=:nombre
    WHERE idcategoria=:idcategoria");

        $sentencia->bindParam(':nombre', $_POST['nombre']);
        $sentencia->bindParam(':idcategoria', $_POST['idcategoria']);

        $sentencia->execute();
        header("Status: 301 Moved Permanently");
               header("Location: CategoriaListar.php");
    } catch (PDOException $th) {
        echo $th->getMessage();
    }
}
require_once 'include/header.php';
?>
<div class="masthead">
    <div class="card" style="width: 18rem; margin:auto;">
        <div class="card-body">
            <div class="h3 tex-center">Editar Categoria</div>
            <form method="POST" action="CategoriaEditar.php">
                <?php
                foreach ($categoria as $categoriaItem) {
                ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID</label>
                        <input type="text" value="<?php echo $categoriaItem['idcategoria']; ?>" name="idcategoria" readonly class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" value="<?php echo $categoriaItem['nombre']; ?>" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <input type="hidden" name="editar" value="editar">
                    <button type="submit" class="btn btn-primary">Grabar</button>
                    <a href="index.php" class="btn btn-danger">Cancelar</a>
                <?php
                }
                ?>

            </form>

        </div>
    </div>
</div>
<?php require_once 'include/footer.php'; ?>