<?php

require_once 'conexionBD.php';
$conexion = new Conexion();

$proveedor = $conexion->query('SELECT * FROM proveedor', PDO::FETCH_ASSOC);
$categoria = $conexion->query('SELECT * FROM categoria', PDO::FETCH_ASSOC);
require_once 'include/header.php';
?>
<div class="masthead">
    <div class="card" style="width: 18rem; margin:auto;">
        <div class="card-body">
            <div class="h3 text-center">Registro de Articulos</div>
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
            <form method="POST" action="ArticuloInsertarPost.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Precio</label>
                    <input type="text" name="precio" class="form-control" id="exampleInputPassword1" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Proveedor</label>
                    <select name="idproveedor" class="form-control" id="exampleInputPassword1">
                        <?php
                        foreach ($proveedor as $provedorItem) {
                        ?>
                            <option value="<?php echo $provedorItem['idproveedor'] ?>"><?php echo $provedorItem['nombre'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <<label for="exampleInputPassword1">Categoria</label>
                        <select name="idcategoria" class="form-control" id="exampleInputPassword1">
                            <?php
                            foreach ($categoria as $categoriaItem) {
                            ?>
                                <option value="<?php echo $categoriaItem['idcategoria'] ?>"><?php echo $categoriaItem['nombre'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Descripcion</label>
                    <textarea name="descripcion" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Descripcion del producto"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Cargar Imagen</label>
                    <input type="file" name="img" class="form-control" id="exampleInputPassword1">
                </div>
        </div>

        <button type="submit" class="btn btn-primary">Grabar </button>
        <a href="index.php" class="btn btn-danger"> Cancelar</a>
        </form>

    </div>
    </div>
    </div>
    <?php require_once 'include/footer.php'; ?>