<?php
ob_start();

include 'base/base.php';
require 'bd.php';


    $message = ''; 
    $em='';
    $em = $conexion->prepare('SELECT idpelicula,idusuario  FROM favoritos WHERE idpelicula = :idpelicula AND  idusuario = :idusuario');
    $em->bindParam(':idpelicula', $_GET['contenido']);
    $em->bindParam(':idusuario', $_SESSION['idusuario']);
    $em->execute();
    $results = $em->fetch(PDO::FETCH_ASSOC); 
    if($results == 0){ 

 
    $sql = "INSERT INTO favoritos (idpelicula, idusuario ) VALUES (:idpelicula, :idusuario)";
    $em = $conexion->prepare($sql);
    $em->bindParam(':idpelicula', $_GET['contenido']);
    $em->bindParam(':idusuario', $_SESSION['idusuario']);
  


    $contenido = $_GET['contenido'];
    if ($em->execute()) {
        header("Location: contenido.php?contenido=$contenido");
    } else {
        echo "Error";
        $message = 'Error detectado';
    }
}else {
  echo "Error";
}
ob_end_flush();
?>
<?php
  $conexion = null;
  $em = null;
?>