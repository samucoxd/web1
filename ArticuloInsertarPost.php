<?php
 require_once 'conexionBD.php';
 $conexion = new Conexion();
try {

   $permitidos = array("image/jpg","image/png","image/gif","image/jpeg");

   $limite_kb = 512;

   $ruta='';

if (in_array($_FILES['img']['type'], $permitidos)  && $_FILES['img']['size'] <= $limite_kb*1024) {

  $ruta = "img/" .$_FILES['img']['name'];

  $tmp = $_FILES['img']['tmp_name'];

  move_uploaded_file($tmp,$ruta);

}
      // Prepare
   $stmt = $conexion->prepare("INSERT INTO articulos (nombre, precio, idproveedor, img, descripcion, idcategoria) VALUES (?, ?, ?, ?, ?, ?)");
   // Bind
   $stmt->bindParam(1, $_POST['nombre']);
   $stmt->bindParam(2, $_POST['precio']);
   $stmt->bindParam(3, $_POST['idproveedor']);
   $stmt->bindParam(4, $ruta);
   $stmt->bindParam(5, $_POST['descripcion']);
   $stmt->bindParam(6, $_POST['idcategoria']);

   // Excecute
   $stmt->execute();
    //header("Status: 301 Moved Permanently");
   // header("Location: ArticuloInsertar.php?mensaje=true");
   echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=ArticuloInsertar.php?mensaje=true'> </head>";
    exit;
} catch (\Throwable $th) {
   echo 'Error al Ingresar el Registro';
}

?>
