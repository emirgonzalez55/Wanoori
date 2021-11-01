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
                    <div class="figure titulo text-center">
					<tr>
						<td class='col-md-3 '><?php echo $dato->imagen; ?></td>
                        <br>
                        <td class='col-md-3 '><?php echo $dato->nombre; ?></td>
                        <br>
						<td class='col-md-3 '><a class="btn btn-danger" href="eliminardelista.php?idfavorito=<?php echo $dato->idfavorito; ?>">Eliminar</a></td>
                    </div>
					</tr>
					<?php
				}
			?>
  </tbody>
</table>




</body> 
</html>