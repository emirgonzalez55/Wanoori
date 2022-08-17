<?php

include 'base/base.php';
require 'bd.php';


$em = $conexion->prepare('SELECT idpelicula, nombre, img, fecha, generos, link, descripcion FROM contenidos  WHERE idpelicula = :contenido ');
$em->bindParam(':contenido', $_GET['contenido']);
$em->execute();
$result = $em->fetchAll(PDO::FETCH_OBJ);


$em = $conexion->prepare('SELECT idpelicula,idusuario, idfavorito  FROM favoritos WHERE idpelicula = :idpelicula AND  idusuario = :idusuario');
$em->bindParam(':idpelicula', $_GET['contenido']);
$em->bindParam(':idusuario', $_SESSION['idusuario']);
$em->execute();
$results = $em->fetch(PDO::FETCH_ASSOC); 

$em = $conexion->prepare('SELECT f.idfavorito, c.nombre, c.img FROM favoritos f INNER JOIN contenidos c on f.idpelicula=c.idpelicula WHERE idusuario = :idusuario');
$em->bindParam(':idusuario', $_SESSION['idusuario']);
$em->execute();
$resultadofavorito = $em->fetchAll(PDO::FETCH_OBJ);

foreach ($resultadofavorito as $datofavorito) {
  $favorito = $datofavorito->idfavorito;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
	foreach ($result as $dato) {
	?>
    <title><?php echo  $dato->nombre; ?></title>

    <div class=" mb-3 contenido " style="max-width: 1152px;">
      <div class="row no-gutters">
        <div class="col-md-3">
          <article class="carta img-fluid bg-dark ">
          <img class="img-fluid imagen" src="data:image;base64,<?php echo base64_encode($dato->img); ?>" alt="...">
          <?php 
          $contenido = $dato->idpelicula;
          if($results == 0){ 
            echo"<a title='Agregar a mi lista' class='bi bi-plus-circle plus' href='agregaralista.php?contenido=$dato->idpelicula'><svg xmlns='http://www.w3.org/2000/svg'  fill='currentColor' class='bi bi-plus-circle' viewBox='0 0 16 16'>
            <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z' />
            <path d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z' />
          </svg> <br> Mi lista</a>";
          }else {
            echo"<a title='Quitar de mi lista' class='bi bi-trash delete' href='eliminardelista.php?idfavorito=$favorito&contenido=$dato->idpelicula'><svg xmlns='http://www.w3.org/2000/svg'  fill='currentColor' class='bi bi-check-circle' viewBox='0 0 16 16'>
            <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
            <path d='M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z'/>
          </svg><br>Eliminar</a>";
          } 
          ?>

        </div>
      </article>
        <div class="col-md-8">
          <div class="card-body">
            <h1><?php echo  $dato->nombre; ?></h1>
            <p>Año: <?php echo  $dato->fecha; ?></p>
            <p>Géneros: <?php echo utf8_encode($dato->generos); ?></p>
            <p>Sinopsis:</p>
            <p class="line-clamp-descripción"><?php echo utf8_encode($dato->descripcion); ?></p>
          </div>
        </div>
      </div>
    </div>

      <div class="trailerdiv" >
        <iframe class="trailer" <?php echo  $dato->link; ?>></iframe>
      </div>


      

	<?php
	}
	?>
</body>
</html>
<?php
  $conexion = null;
  $em = null;
?>
