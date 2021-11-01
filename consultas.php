<?php

include 'base/base.php';
require 'bd.php';
$result='';


if (!empty($_POST['consulta'])) {  
  $nombre = '%'.$_POST['consulta'].'%';
  $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $em = $conexion->prepare('SELECT idpelicula,imagen,nombre FROM contenidos WHERE nombre LIKE :consulta  ');
  $em->bindParam(':consulta', $nombre);
  $em->execute();

  

  $result = $em->fetchAll(PDO::FETCH_OBJ);


    if($result) {
      $message='Resultados de la busqueda.';
   } else  {
     $message='No hay resultados que coincidan con la busqueda';;
   }
   
  }

?>

<!doctype html>
  <head>
    <title>resultado</title>
  </head>

  <body>
    <h1 class="Tablas">
    <?php if(!empty($message)):  ?>
        <?= $message ?>
            <br>
    <?php endif; ?>

    </h1>
	


		
    <?php 
    if (is_array($result) || is_object($result)){
				foreach ($result as $dato) { 
					?>
					<tr>
						

				<div class="figure titulo text-center">
					
						<td><?php echo  $dato->imagen; ?></td> 
						<br>
						<td>  <?php  echo $dato->nombre;  ?></td>
						<br>
						<td><a class="btn btn-success" href="agregaralista.php?idpelicula=<?php echo $dato->idpelicula; ?>">Agregar a mi lista </a></td>

              </div>
					</tr>
					<?php
				}
     }
			?>
	<body>
	
	</body> 
</html>
<?php
  $conexion = null;
  $em = null;
?>