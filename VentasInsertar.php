<?php
 require_once 'conexionBD.php';
 $conexion = new Conexion();
$precio=0;
 $articulo = $conexion->query('SELECT * FROM articulos WHERE=$_POST["idarticulos"]', PDO::FETCH_ASSOC);
 $cliente = $conexion->query('SELECT * FROM cliente WHERE=$_POST["idcliente"]', PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Registro de Ventas</title>
  </head>
  <body>
    <h1>Registro de Ventas</h1>

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

<div class="card" style="width: 18rem; margin:auto;">
    <div class="card-body">
    <form method="POST" action="VentasInsertarPost.php">
        <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">ID-Cliente</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Cod-Producto</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                   <?php foreach ($cliente as $clienteItem) {
                  ?>
                     <td><input type="text" name="idcliente" value="<?php echo $clienteItem['idcliente']; ?>" readonly></td>
                     <td><input type="text" name="nombrecliente" value="<?php echo $clienteItem['nombre']; ?>" readonly></td>
                  <?php
                   } 
                   ?>
                   <?php foreach ($articulo as $articuloItem) {
                  ?>
                     <td><input type="text" name="idarticulos[]" value="<?php echo $articuloItem['idarticulos']; ?>" readonly></td>
                     <td><input type="text" name="nombrearticulos[]" value="<?php echo $articuloItem['nombre']; ?>" readonly></td>
                     <td><input type="text" name="precio[]" value="<?php echo $articuloItem['precio']; $precio=$articuloItem['precio']; ?>" readonly></td>
                  <?php
                   } 
                   ?>
                   <td><input type="text" name="cantidad" value="<?php echo $_POST['cantidad']; ?>" readonly></td>
                   <td><input type="text" name="total" value="<?php echo $precio*$_POST['cantidad']; ?>" readonly></td>
                </tbody>
            </table>
        <button type="submit" class="btn btn-primary">Grabar    </button>
        <a href="index.php" class="btn btn-danger"> Cancelar</a>
    </form>

    </div>
</div>
    








    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
