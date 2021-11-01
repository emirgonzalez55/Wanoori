<?php  
include 'base/base.php';
require 'bd.php';
$em = $conexion->query("SELECT idpelicula,imagen,nombre FROM contenidos ;");
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
					<tr>
            
                <div class="card text-white bg-dark mb-3" style="max-width: 260px;" >
                    <td><?php echo  $dato->imagen; ?></td> 
                    <div class="card-body ">
                    <h6 class="card-title "><p class="card-text"><td><?php  echo $dato->nombre;  ?></td></p></h6>
                    <td><a class="btn btn-success " href="testagregar.php?idpelicula=<?php echo $dato->idpelicula; ?>">Agregar a mi lista </a></td>  
                  </div>
                </div>	
                		
                	
					</tr>
					<?php
				}
			?>

          
 </html>             
<?php
  $conexion = null;
  $em = null;
?>
