<?php require_once 'include/header.php'; ?>

<div class="masthead">
<div class="card" style="width: 18rem; margin:auto;">
<h3 class="text-center">Registro de Proveedor</h3>
    <div class="card-body">
    <?php
        if(isset($_GET['mensaje'])) {
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
    <form method="POST" action="ProveedorInsertarPost.php">
        <div class="form-group">
            <label for="exampleInputEmail1">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Pais</label>
            <input type="text" name="pais" class="form-control" id="exampleInputPassword1" required>
        </div>

        <button type="submit" class="btn btn-primary">Grabar    </button>
        <a href="index.php" class="btn btn-danger"> Cancelar</a>
    </form>

    </div>
</div>
</div>
<?php require_once 'include/footer.php'; ?>