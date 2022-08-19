<?php 
	session_start();

	if (isset($_SESSION['idusuario'])) {

	}else
		header("Location:index.php");

	if (!isset($_GET['idfavorito'])) {
		exit();
	}
	$idusuario = $_SESSION['idusuario'];
	$idfavorito = $_GET['idfavorito'];
	if(!empty($_GET['contenido'])){
		$contenido = $_GET['contenido'];
	}

	include 'bd.php';
	$em = $conexion->prepare("DELETE FROM favoritos WHERE idfavorito = ? AND idusuario = ?;");
	$result = $em->execute([$idfavorito, $idusuario ]);
	$delete = $em->rowCount();

	if ($delete === 1 && !empty($contenido)) {
		header("Location: contenido.php?contenido=$contenido");
	}
	elseif ($delete === 1 && empty($contenido)) {
		header("Location: milista.php");

	}elseif (empty($contenido) && $delete === 0) {
		print("ERROR 404");

	}else{
		print("ERROR 404 ");
	}

	if ($result === TRUE) {

	}else{
		print ("Error");
	}

?>
<?php
  $conexion = null;
  $em = null;
?>
