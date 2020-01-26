<?php

require_once 'conexionBD.php';
 $conexion = new Conexion();

 $articulo = $conexion->query('SELECT * FROM articulos', PDO::FETCH_ASSOC);
 $cliente = $conexion->query('SELECT * FROM cliente', PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>

		<script>
			
    		$(function(){
				// Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
				$("#adicional").on('click', function(){
					$("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
				});
			 
				// Evento que selecciona la fila y la elimina 
				$(document).on("click",".eliminar",function(){
					var parent = $(this).parents().get(0);
					$(parent).remove();
				});
			});
		</script>
    <title>Compra</title>
  </head>
  <body>
  <header>
			<div class="alert alert-info">
			<h2>Insertar Registros a la BD con PHP y JQUERY</h2>
			</div>
		</header>

		<section>
			<form method="post" action="VentasInsertarPost.php">
                <h3 class="bg-primary text-center pad-basic no-btm">Agregar Nueva Venta </h3>
                <div class="card" style="width: 18rem; margin:auto;">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Fecha</label>
                        <input type="date" name="fecha" value="<?php echo date("Y-m-d"); ?>" readonly class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Cliente</label>
                        <select name="idcliente" class="form-control" id="exampleInputPassword1">
                            <?php
                                foreach ($cliente as $clienteItem) {
                            ?>
                                <option value="<?php echo $clienteItem['idcliente'] ?>"><?php echo $clienteItem['nombre'] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                </div>
				<table class="table bg-info"  id="tabla">
					<tr class="fila-fija">
						<td>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Producto</label>
                            <select name="idarticulos[]" class="form-control" >
                                <?php
                                    foreach ($articulo as $articuloItem) {
                                ?>
                                <option value="<?php echo $articuloItem['idarticulos']; ?>"><?php echo $articuloItem['nombre'].' + '.$articuloItem['precio']; ?></option>
                                <?php        
                                    }
                                ?>
                            </select>    
                            </div>
                        </td>
						
						<td>
                            <label for="exampleInputPassword1">Cantidad</label>    
                            <input required name="cantidad[]" placeholder="cantidad" class="form-control"/>
                        </td>
						<td class="eliminar" style="padding-top: 45px;"><input type="button"   value="Menos -"/></td>
					</tr>
				</table>

				<div class="btn-der">
					<input type="submit" name="insertar" value="Calcular" class="btn btn-info "/>
					<button id="adicional" name="adicional" type="button" class="btn btn-warning"> Más + </button>

				</div>
			</form>
  </body>
</html>
