<?php require_once 'include/header.php'; ?>
<div class="masthead">
<div class="card" style="width: 18rem; margin:auto;">
    <div class="card-body">
        <div class="h3 text-center">Registro de Categoria</div>
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
    <form method="POST" action="CategoriaInsertarPost.php">
        <div class="form-group">
            <label for="exampleInputEmail1">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <button type="submit" class="btn btn-primary">Grabar    </button>
        <a href="index.php" class="btn btn-danger"> Cancelar</a>
    </form>

    </div>
</div>
</div>
<?php require_once 'include/footer.php'; ?>
