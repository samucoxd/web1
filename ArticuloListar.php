<?php

require_once 'conexionBD.php';
$conexion = new Conexion();
$articulos = $conexion->query('SELECT 
idarticulos, articulos.nombre, precio, proveedor.nombre as proveedor, categoria.nombre as categoria, descripcion, img FROM articulos
inner join proveedor on articulos.idproveedor = proveedor.idproveedor
inner join categoria on articulos.idcategoria = categoria.idcategoria', PDO::FETCH_ASSOC);
//eliminar por id

if (isset($_GET['opcion'])) {
    if ($_GET['opcion'] == 'eliminar') {

        try {
            $sql = 'DELETE FROM articulos ' . 'WHERE idarticulos = :idarticulos';

            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(':idarticulos', $_GET['id']);

            $stmt->execute();

           // header("Status: 301 Moved Permanently");
            //header("Location: ArticuloListar.php?mensaje=true");
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=ArticuloListar.php?mensaje=true'> </head>";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}
require_once 'include/header.php';
?>

<div class="masthead">
<div class="card" style="width: 70rem; margin:auto;">
<h3 class="text-center">Listado de Articulos</h3>
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
                    <th scope="col">Precio</th>
                    <th scope="col">Provedor</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Eliminar</th>
                    <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>


                <?php
                foreach ($articulos as $articulosItem) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $articulosItem['idarticulos']; ?></th>
                        <td><?php echo $articulosItem['nombre']; ?></td>
                        <td><?php echo $articulosItem['precio']; ?></td>
                        <td><?php echo $articulosItem['proveedor']; ?></td>
                        <td><?php echo $articulosItem['categoria']; ?></td>
                        <td><?php echo $articulosItem['descripcion']; ?></td>
                        <td><img src="<?php echo $articulosItem['img']; ?>" class="img-thumbnail" width="50" height="50"></td>
                        <td><a href="ArticuloListar.php?opcion=eliminar&id=<?php echo $articulosItem['idarticulos']; ?>" class="btn btn-danger">Eliminar</a></td>
                        <td><a href="ArticuloEditar.php?opcion=editar&id=<?php echo $articulosItem['idarticulos']; ?>" class="btn btn-success">Editar</a></td>
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