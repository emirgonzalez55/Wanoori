
<?php

require 'bd.php';
include 'base/base.php';

  $idpelicula = $_GET['idpelicula'];
  $em = $conexion->prepare('SELECT idpelicula  FROM contenidos WHERE idpelicula = ?');
  $em->execute();
  $results = $em->fetch(PDO::FETCH_ASSOC); 


 
?>
<?php

  require 'bd.php';

  $message = ''; 
    $em='';
    $em = $conexion->prepare('SELECT idpelicula,idusuario  FROM favoritos WHERE idpelicula = :idpelicula AND  idusuario = :idusuario');
    $em->bindParam(':idpelicula', $_GET['idpelicula']);
    $em->bindParam(':idusuario', $_SESSION['idusuario']);
    $em->execute();
    $results = $em->fetch(PDO::FETCH_ASSOC); 
    if($results == 0){ 

 
    $sql = "INSERT INTO favoritos (idpelicula, idusuario ) VALUES (:idpelicula, :idusuario)";
    $em = $conexion->prepare($sql);
    $em->bindParam(':idpelicula', $_GET['idpelicula']);
    $em->bindParam(':idusuario', $_SESSION['idusuario']);
  



    if ($em->execute()) {
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
?>
<?php
  $conexion = null;
  $em = null;
?>
