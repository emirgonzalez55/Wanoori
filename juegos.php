<?php  
include 'base/base.php';
require 'bd.php';
$em = $conexion->query("SELECT idpelicula,imagen,nombre FROM contenidos WHERE tipo='juego';");
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
					<tr>
						

				<div class="figure titulo text-center">
					
						<td> <?php echo  $dato->imagen; ?>  </td> 
						<br>
						<td> <?php  echo $dato->nombre;  ?></td>
						<br>
						<td><a class="btn btn-success" href="agregaralista.php?idpelicula=<?php echo $dato->idpelicula; ?>">Agregar a mi lista </a></td>

              </div>
					</tr>
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