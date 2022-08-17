<?php  
	if (!isset($_GET['idfavorito'])) {
		exit();
	}

	$idfavorito = $_GET['idfavorito'];
	$contenido = $_GET['contenido'];
	include 'bd.php';
	$em = $conexion->prepare("DELETE FROM favoritos WHERE idfavorito = ?;");
	$result = $em->execute([$idfavorito]);

	if ($result === TRUE && !empty($contenido)) {
		header("Location: contenido.php?contenido=$contenido");
	}else{
		echo "Error";
	}
	if(empty($contenido)){
		header("Location: milista.php");
	}

?>
<?php
  $conexion = null;
  $em = null;
?>