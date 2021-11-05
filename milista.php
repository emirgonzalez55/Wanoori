<?php
include 'base/base.php';
require 'bd.php';

$em = $conexion->prepare('SELECT f.idfavorito, c.nombre, c.imagen FROM favoritos f INNER JOIN contenidos c on f.idpelicula=c.idpelicula WHERE idusuario = :idusuario');
$em->bindParam(':idusuario', $_SESSION['idusuario']);
$em->execute();
$result = $em->fetchAll(PDO::FETCH_OBJ);
?>

<!doctype html>

<head>
	<title>mi lista</title>
</head>

<body>
	<h1 class="Tablas">Mi lista</h1>




	<?php
	foreach ($result as $dato) {
	?>
		<main class="grid">
			<article class="text-white bg-dark mb-3 ">
				<?php echo  $dato->imagen; ?>
				<div class="card-title ">
					<p class="line-clamp"><?php echo $dato->nombre;  ?></p>
					<a class="bi bi-trash delete" href="eliminardelista.php?idfavorito=<?php echo $dato->idfavorito; ?>"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
							<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
							<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
						</svg><br>Eliminar</a>
				</div>
			</article>
		</main>
	<?php
	}
	?>
	</tbody>
	</table>




</body>

</html>