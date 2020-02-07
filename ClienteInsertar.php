<?php require_once 'include/header.php';?>
<div class="masthead">
<div class="card" style="width: 18rem; margin:auto;">
<h3 class="text-center">Registro de Clientes</h3>
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
    <form method="POST" action="ClienteInsertarPost.php">
        <div class="form-group">
            <label for="exampleInputEmail1">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Edad</label>
            <input type="text" name="edad" class="form-control" id="exampleInputPassword1" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Telefono</label>
            <input type="text" name="telefono" class="form-control" id="exampleInputPassword1" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Carnet</label>
            <input type="text" name="ci" class="form-control" id="exampleInputPassword1" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">direccion</label>
            <input type="text" name="direccion" class="form-control" id="exampleInputPassword1" required>
        </div>

        <button type="submit" class="btn btn-primary">Grabar    </button>
        <a href="index.php" class="btn btn-danger"> Cancelar</a>
    </form>

    </div>
</div>
</div>
<?php require_once 'include/footer.php'; ?>