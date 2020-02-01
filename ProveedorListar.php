<?php

require_once 'conexionBD.php';
$conexion = new Conexion();
$proveedor = $conexion->query('SELECT * FROM proveedor', PDO::FETCH_ASSOC);
//eliminar por id

if (isset($_GET['opcion'])) {
    if ($_GET['opcion'] == 'eliminar') {

        try {
            $sql = 'DELETE FROM proveedor ' . 'WHERE idproveedor = :idproveedor';

            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(':idproveedor', $_GET['id']);

            $stmt->execute();

           // header("Status: 301 Moved Permanently");
           // header("Location: ProveedorListar.php?mensaje=true");
           echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=ProveedorListar.php?mensaje=true'> </head>";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}
require_once 'include/header.php';
?>

<div class="masthead">
<div class="card" style="width: 40rem; margin:auto;">
<h3 class="text-center">Listado de Clientes</h3>
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
                    <th scope="col">Pais</th>
                    <th scope="col">Eliminar</th>
                    <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>


                <?php
                foreach ($proveedor as $proveedorItem) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $proveedorItem['idproveedor']; ?></th>
                        <td><?php echo $proveedorItem['nombre']; ?></td>
                        <td><?php echo $proveedorItem['pais']; ?></td>
                        <td><a href="ProveedorListar.php?opcion=eliminar&id=<?php echo $proveedorItem['idproveedor']; ?>" class="btn btn-danger">Eliminar</a></td>
                        <td><a href="ProveedorEditar.php?opcion=editar&id=<?php echo $proveedorItem['idproveedor']; ?>" class="btn btn-success">Editar</a></td>
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