<?php
 require_once 'conexionBD.php';
 $conexion = new Conexion();
try {
     // Prepare
    $stmt = $conexion->prepare("INSERT INTO proveedor (nombre, pais) VALUES (?, ?)");
    // Bind
    $stmt->bindParam(1, $_POST['nombre']);
    $stmt->bindParam(2, $_POST['pais']);

    // Excecute
    $stmt->execute();

   // header("Status: 301 Moved Permanently");
    //header("Location: ProveedorInsertar.php?mensaje=true");
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=ProveedorInsertar.php?mensaje=true'> </head>";
    exit;
} catch (\Throwable $th) {
   echo 'Error al Ingresar el Registro';
}

?>
