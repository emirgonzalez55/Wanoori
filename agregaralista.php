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
  



    if ($em->execute()) {
        $message = 'Error detectado';
        header('Location: milista.php');
    } else {
        $message = 'Error detectado';
    }
}else {
  echo'<script type="text/javascript">
  alert("Ya agregaste este contenido a tu lista!");
  window.location.href="milista.php";
  </script>';
}
ob_end_flush();
?>
<?php
  $conexion = null;
  $em = null;
?>