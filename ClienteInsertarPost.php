<?php
 require_once 'conexionBD.php';
 $conexion = new Conexion();
try {
     // Prepare
    $stmt = $conexion->prepare("INSERT INTO cliente (nombre, edad, telefono, ci, direccion) VALUES (?, ?, ? , ?, ?)");
    // Bind
    $stmt->bindParam(1, $_POST['nombre']);
    $stmt->bindParam(2, $_POST['edad']);
    $stmt->bindParam(3, $_POST['telefono']);
    $stmt->bindParam(4, $_POST['ci']);
    $stmt->bindParam(5, $_POST['direccion']);
    // Excecute
    $stmt->execute();

    header("Status: 301 Moved Permanently");
    header("Location: ClienteInsertar.php?mensaje=true");
    exit;
} catch (\Throwable $th) {
   echo 'Error al Ingresar el Registro';
}

?>
