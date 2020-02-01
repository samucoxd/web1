<?php
 require_once 'conexionBD.php';
 $conexion = new Conexion();
try {
     // Prepare
    $stmt = $conexion->prepare("INSERT INTO categoria (nombre) VALUES (?)");
    // Bind
    $stmt->bindParam(1, $_POST['nombre']);
    // Excecute
    $stmt->execute();

    //header("Status: 301 Moved Permanently");
    //header("Location: CategoriaInsertar.php?mensaje=true");
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=CategoriaInsertar.php?mensaje=true'> </head>";
    exit;
} catch (\Throwable $th) {
   echo 'Error al Ingresar el Registro';
}

?>
