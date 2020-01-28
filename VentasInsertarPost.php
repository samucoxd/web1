<?php
require_once 'conexionBD.php';
$conexion = new Conexion();

$articulo = $_POST['idarticulos'];
$cantidad = $_POST['cantidad'];
$total = 0;
$totalprecio = 0;
foreach ($articulo as $key => $articuloItem) {
    $aux = $conexion->query('SELECT * FROM articulos WHERE idarticulos='.$articuloItem.';', PDO::FETCH_ASSOC);
    foreach ($aux as $auxItem) {
        $totalprecio = $totalprecio + ($auxItem['precio'] * $cantidad[$key]);
    }
}
try {
    // Prepare
   $stmt = $conexion->prepare("INSERT INTO ventas (fecha, idcliente, subtotal, total) VALUES (?, ? , ?, ?)");
   // Bind
   $stmt->bindParam(1, $_POST['fecha']);
   $stmt->bindParam(2, $_POST['idcliente']);
   $stmt->bindParam(3, $totalprecio);
   $stmt->bindParam(4, $totalprecio);
   // Excecute
   $stmt->execute();

   $lastInsertId = $conexion->lastInsertId();
   foreach ($articulo as $key => $articuloItem) {
    $aux = $conexion->query('SELECT precio FROM articulos WHERE idarticulos='.$articuloItem.';', PDO::FETCH_ASSOC);
    foreach ($aux as $auxItem) {
        $total =($auxItem['precio'] * $cantidad[$key]);
    }
    $stmt = $conexion->prepare("INSERT INTO detalleventa (idventas, idarticulos, cantidad, total) VALUES (?, ?, ?, ?)");
    $stmt->bindParam(1, $lastInsertId);
    $stmt->bindParam(2, $articuloItem);
    $stmt->bindParam(3, $cantidad[$key]);
    $stmt->bindParam(4, $total);
    $stmt->execute();
}
   

   header("Status: 301 Moved Permanently");
   header("Location: VentaListar.php");
   exit;
} catch (\Throwable $th) {
  echo 'Error al Ingresar el Registro';
}

?>
