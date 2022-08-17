<?php

include 'base/base.php';
require 'bd.php';
$result = '';


if (!empty($_POST['consulta'])) {
  $nombre = '%' . $_POST['consulta'] . '%';
  $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $em = $conexion->prepare('SELECT idpelicula,img,nombre FROM contenidos WHERE nombre LIKE :consulta  ');
  $em->bindParam(':consulta', $nombre);
  $em->execute();



  $result = $em->fetchAll(PDO::FETCH_OBJ);


  if ($result) {
    $message = 'Resultados de la busqueda.';
  } else {
    $message = 'No hay resultados que coincidan con la busqueda';;
  }
}

?>

<!doctype html>

<head>
  <title>resultado</title>
</head>

<body>
  <h1 class="Tablas">
    <?php if (!empty($message)) :  ?>
      <?= $message ?>
      <br>
    <?php endif; ?>
  </h1>




  <?php
  if (is_array($result) || is_object($result)) {
    foreach ($result as $dato) {
  ?>
  <div>
      <main class="grid">
        <article class="bg-dark mb-3 ">
        <a href="contenido.php?contenido=<?php echo $dato->idpelicula; ?>"> <img src="data:image;base64,<?php echo base64_encode($dato->img); ?> "></a>
          <div>
          <a href="contenido.php?contenido=<?php echo $dato->idpelicula; ?>"><p class="line-clamp card-title link-titulo"><?php echo $dato->nombre; ?></p></a>
          </div>
        </article>
      </main>
  </div>
      
  <?php
    }
  }
  ?>


</body>
</html>
<?php
$conexion = null;
$em = null;
?>