<?php

require_once 'conexionBD.php';
$conexion = new Conexion();
$categoria = $conexion->query('SELECT * FROM categoria', PDO::FETCH_ASSOC);
//eliminar por id

if (isset($_GET['opcion'])) {
    if ($_GET['opcion'] == 'eliminar') {

        try {
            $sql = 'DELETE FROM categoria ' . 'WHERE idcategoria = :idcategoria';

            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(':idcategoria', $_GET['id']);

            $stmt->execute();

            header("Status: 301 Moved Permanently");
            header("Location: CategoriaListar.php?mensaje=true");
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}
require_once 'include/header.php';
?>

<div class="masthead">
<div class="card" style="width: 40rem; margin:auto;">
<h3 class="text-center">Listado de Categoria</h3>
    <div class="card-body">
        <?php
        if (isset($_GET['mensaje'])) {
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Exito</strong> Registro Eliminado
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php
        }
        ?>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Eliminar</th>
                    <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>


                <?php
                foreach ($categoria as $categoriaItem) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $categoriaItem['idcategoria']; ?></th>
                        <td><?php echo $categoriaItem['nombre']; ?></td>
                        <td><a href="CategoriaListar.php?opcion=eliminar&id=<?php echo $categoriaItem['idcategoria']; ?>" class="btn btn-danger">Eliminar</a></td>
                        <td><a href="CategoriaEditar.php?opcion=editar&id=<?php echo $categoriaItem['idcategoria']; ?>" class="btn btn-success">Editar</a></td>
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