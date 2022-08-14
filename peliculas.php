<?php
include 'base/base.php';
require 'bd.php';
$em = $conexion->query("SELECT idpelicula,img,nombre FROM contenidos WHERE tipo='pelicula';");
$result = $em->fetchAll(PDO::FETCH_OBJ);
?>

<!doctype html>

<head>
	<title>peliculas</title>
</head>

<body>
	<h1 class="Tablas">Listado de peliculas</h1>




	<?php
	foreach ($result as $dato) {
	?>
		<main class="grid">
			<article class="text-white bg-dark mb-3 ">
			<a href="contenido.php?contenido=<?php echo $dato->nombre; ?>"> <img src="data:image;base64,<?php echo base64_encode($dato->img); ?>"></a>
				<div class="card-title ">
					<p class="line-clamp"><?php echo $dato->nombre;  ?></p>
					<a class="bi bi-plus-circle plus " href="agregaralista.php?contenido=<?php echo $dato->idpelicula; ?>"><svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
							<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
							<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
						</svg> <br> Mi lista</a>
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