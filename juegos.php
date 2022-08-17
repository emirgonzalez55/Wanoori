<?php
include 'base/base.php';
require 'bd.php';
$em = $conexion->query("SELECT idpelicula,nombre,img FROM contenidos WHERE tipo='juego';");
$result = $em->fetchAll(PDO::FETCH_OBJ);
?>

<!doctype html>

<head>
	<title>juegos</title>
</head>

<body>
	<h1 class="Tablas">Listado de juegos</h1>


	<?php
	foreach ($result as $dato) {
	?>
		<main class="grid">
			<article class="text-white bg-dark mb-3 ">
				<a href="contenido.php?contenido=<?php echo $dato->idpelicula; ?>"> <img src="data:image;base64,<?php echo base64_encode($dato->img); ?> "></a>
				<div class="card-title ">
					<a href="contenido.php?contenido=<?php echo $dato->idpelicula; ?>" ><p class="line-clamp link-titulo  card-title"><?php echo $dato->nombre;  ?></p></a>
				</div>
			</article>
		</main>
	<?php
	}
	?>

	<body>




	</body>

	</html>
	<?php
	$conexion = null;
	$em = null;
	?>