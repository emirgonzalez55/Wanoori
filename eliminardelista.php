<?php  
	if (!isset($_GET['idfavorito'])) {
		exit();
	}

	$idfavorito = $_GET['idfavorito'];
	include 'bd.php';
	$em = $conexion->prepare("DELETE FROM favoritos WHERE idfavorito = ?;");
	$result = $em->execute([$idfavorito]);

	if ($result === TRUE) {
		header('Location: milista.php');
	}else{
		echo "Error";
	}

?>
<?php
  $conexion = null;
  $em = null;
?>