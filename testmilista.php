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
                    <div class="gallery mensaje text-center">
					<tr>
                    <td class='col-md-3  '><?php echo $dato->imagen; ?></td>

                    <div class="desc"><td class='col-md-3 '><?php echo $dato->nombre; ?></td></div>
                    <td class='col-md-3 '><a class="btn btn-danger" href="eliminardelista.php?idfavorito=<?php echo $dato->idfavorito; ?>">Eliminar</a></td>
                    </div>
					</tr>
					<?php
				}
			?>
  </tbody>
</table>

</style>
</head>
<body>
<div class="gallery">
  <a href="contenido/peliculas/matrix.php">  <img  width="260" height="370" src="contenido/peliculas/img/matrix.png" ></a>
  <div class="desc">Add a description of the image here</div>
</div>






</body>
</html>



</body> 
</html>