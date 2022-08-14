<?php

include 'base/base.php';
require 'bd.php';


$em = $conexion->prepare('SELECT nombre, img, fecha, generos, link, descripcion FROM contenidos  WHERE nombre = :contenido ');
$em->bindParam(':contenido', $_GET['contenido']);
$em->execute();
$result = $em->fetchAll(PDO::FETCH_OBJ);

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

<div class="mb-3 pelicula mensaje" style="max-width: 1052px;">
  <div class="row g-0">
    <div class="col-md-3">
      <img src="data:image;base64,<?php echo base64_encode($dato->img); ?> "class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <h1><?php echo  $dato->nombre; ?></h1>
      <p>Año: <?php echo  $dato->fecha; ?></p>
      <p>Géneros: <?php echo utf8_encode($dato->generos); ?></p>
      <h4>sinopsis:</h4>
      <p class="line-clamp-descripción"><?php echo utf8_encode($dato->descripcion); ?></p>
      </div>
    </div>
  </div>
</div>
    <div class="trailer" style="max-width: 100%;"  >
        <iframe width="100%" height="100%"  <?php echo  $dato->link; ?>></iframe>
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