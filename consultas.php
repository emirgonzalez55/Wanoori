<?php

include 'base/base.php';
require 'bd.php';
$result = '';


if (!empty($_POST['consulta'])) {
  $nombre = '%' . $_POST['consulta'] . '%';
  $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $em = $conexion->prepare('SELECT idpelicula,imagen,nombre FROM contenidos WHERE nombre LIKE :consulta  ');
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
        <article class="text-white bg-dark mb-3 ">
          <?php echo  $dato->imagen; ?>
          <div class="card-title ">
            <p class="line-clamp"><?php echo $dato->nombre;  ?></p>
            <a class="bi bi-plus-circle plus " href="agregaralista.php?idpelicula=<?php echo $dato->idpelicula; ?>"><svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
              </svg> <br> Mi lista</a>
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