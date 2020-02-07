<?php

require_once 'conexionBD.php';
$conexion = new Conexion();


//eliminar por id

if (isset($_GET['opcion'])) {
    if ($_GET['opcion'] == 'editar') {

        $articulos = $conexion->query('SELECT * FROM articulos WHERE idarticulos=' . $_GET["id"] . '', PDO::FETCH_ASSOC);
        $proveedor = $conexion->query('SELECT * FROM proveedor', PDO::FETCH_ASSOC);
        $categoria = $conexion->query('SELECT * FROM categoria', PDO::FETCH_ASSOC);
    }
}

if (isset($_POST['editar'])) {

        $permitidos = array("image/jpg", "image/png", "image/gif", "image/jpeg");

        $limite_kb = 512;

        $ruta = '';
        echo $_FILES['img']['name'];
        if (in_array($_FILES['img']['type'], $permitidos)  && $_FILES['img']['size'] <= $limite_kb * 1024) {

            echo "<script> alert('con img')</script>";

            $ruta = "img/" . $_FILES['img']['name'];

            $tmp = $_FILES['img']['tmp_name'];

            move_uploaded_file($tmp, $ruta);

            $sentencia = $conexion->prepare("UPDATE articulos SET 
        nombre=:nombre,
        precio=:precio,
        idproveedor=:idproveedor,
        img=:img,
        descripcion=:descripcion,
        idcategoria=:idcategoria 
        WHERE idarticulos=:idarticulos");

            $sentencia->bindParam(':nombre', $_POST['nombre']);
            $sentencia->bindParam(':precio', $_POST['precio']);
            $sentencia->bindParam(':idproveedor', $_POST['idproveedor']);
            $sentencia->bindParam(':img', $ruta);
            $sentencia->bindParam(':descripcion', $_POST['descripcion']);
            $sentencia->bindParam(':idcategoria', $_POST['idcategoria']);
            $sentencia->bindParam(':idarticulos', $_POST['idarticulos']);

            $sentencia->execute();
            //header("Status: 301 Moved Permanently");
            //header("Location: ArticuloListar.php");
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=ArticuloListar.php?mensaje=true'> </head>";
        
    } else {
        echo "<script> alert('sin img')</script>";
        $sentencia = $conexion->prepare("UPDATE articulos SET 
        nombre=:nombre,
        precio=:precio,
        idproveedor=:idproveedor,
        descripcion=:descripcion,
        idcategoria=:idcategoria 
        WHERE idarticulos=:idarticulos");

        $sentencia->bindParam(':nombre', $_POST['nombre']);
        $sentencia->bindParam(':precio', $_POST['precio']);
        $sentencia->bindParam(':idproveedor', $_POST['idproveedor']);
        $sentencia->bindParam(':descripcion', $_POST['descripcion']);
        $sentencia->bindParam(':idcategoria', $_POST['idcategoria']);
        $sentencia->bindParam(':idarticulos', $_POST['idarticulos']);

        $sentencia->execute();
       // header("Status: 301 Moved Permanently");
         // header("Location: ArticuloListar.php");
         echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=ArticuloListar.php?mensaje=true'> </head>";
    }
}
require_once 'include/header.php';
?>

<div class="masthead">
    <div class="card" style="width: 18rem; margin:auto;">
        <div class="card-body">
            <div class="h3 text-center">Editar Articulo</div>
            <form method="POST" action="ArticuloEditar.php" enctype="multipart/form-data">
                <?php
                foreach ($articulos as $articulosItem) {
                ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID</label>
                        <input type="text" value="<?php echo $articulosItem['idarticulos']; ?>" name="idarticulos" readonly class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" name="nombre" value="<?php echo $articulosItem['nombre']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Precio</label>
                        <input type="text" name="precio" value="<?php echo $articulosItem['precio']; ?>" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Proveedor</label>
                        <select name="idproveedor" class="form-control" id="exampleInputPassword1">
                            <?php
                            foreach ($proveedor as $provedorItem) {
                                if ($provedorItem['idproveedor'] == $articulosItem['idproveedor']) {
                            ?>
                                    <option value="<?php echo $provedorItem['idproveedor']; ?>" selected><?php echo $provedorItem['nombre']; ?></option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?php echo $provedorItem['idproveedor']; ?>"><?php echo $provedorItem['nombre']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Categoria</label>
                        <select name="idcategoria" class="form-control" id="exampleInputPassword1">
                            <?php
                            foreach ($categoria as $categoriaItem) {
                                if ($categoriaItem['idcategoria'] == $articulosItem['idcategoria']) {
                            ?>
                                    <option value="<?php echo $categoriaItem['idcategoria']; ?>" selected><?php echo $categoriaItem['nombre']; ?></option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?php echo $categoriaItem['idcategoria']; ?>"><?php echo $categoriaItem['nombre']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Descripcion</label>
                        <textarea name="descripcion" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Descripcion del producto"><?php echo $articulosItem['descripcion']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <img src="<?php echo $articulosItem['img']; ?>" class="img-thumbnail" width="50" height="50">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Cargar Imagen</label>
                        <input type="file" name="img" class="form-control" id="exampleInputPassword1">
                    </div>
                    <input type="hidden" name="editar" value="editar">
                    <button type="submit" class="btn btn-primary">Grabar</button>
                    <a href="index.html" class="btn btn-danger"> Cancelar</a>
                <?php
                }
                ?>

            </form>

        </div>
    </div>
</div>

<?php require_once 'include/footer.php'; ?>