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

            //header("Status: 301 Moved Permanently");
            //header("Location: ClienteListar.php?mensaje=true");
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=ClienteListar.php?mensaje=true'> </head>";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}
require_once 'include/header.php';
?>

<div class="masthead">
<div class="card" style="width: 60rem; margin:auto;">
<h3 class="text-center">Listado de Clientes</h3>
    <div class="card-body">
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
</div>
<?php require_once 'include/footer.php'; ?>