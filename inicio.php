<?php

include 'base/base.php';
 ?>   
<!doctype html>
  <head>
  <link href="css/carousel.css" rel="stylesheet">
    <title>Inicio</title>


  </head>
  <body>

  <main>

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="bd-placeholder-img"  width="100%" height="100%" src="img/wanoori3.jpg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></img>

        <div class="container">
          <div class="carousel-caption text-center">
            <h1 style="color: white;">Bienvenid@ <br> <?php print_r($_SESSION['user_id']);?></h1>
            <p>¿Que agregaras a tu lista hoy?</p>
            <p><a class="btn btn-lg btn-primary" href="milista.php">Mi lista</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
      <img class="bd-placeholder-img"  width="100%" height="100%" src="img/wanoori2.jpg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></img>

        <div class="container">
          <div class="carousel-caption">
            <h1 style="color: white;">WANOORI</h1>
            <p>¿Estas buscando alguna pelicula?</p>
            <p><a class="btn btn-lg btn-primary" href="peliculas.php">Ver peliculas</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
      <img class="bd-placeholder-img"  width="100%" height="100%" src="img/wanoori.jpg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></img>

        <div class="container">
          <div class="carousel-caption text-center">
            <h1 style="color: white;">WANOORI</h1>
            <p>¿Estas buscando alguna serie?</p>
            <p><a class="btn btn-lg btn-primary" href="series.php">Ver series</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
    



  <?php
require 'bd.php';
$em = $conexion->query("SELECT idpelicula,img,nombre FROM contenidos ORDER BY idpelicula DESC LIMIT 10 ;");
$result = $em->fetchAll(PDO::FETCH_OBJ);
?>



<body>
	<h1 class="Tablas">Contenido agregado recientemente</h1>




	<?php
	foreach ($result as $dato) {
	?>
		<main class="grid">
			<article class="text-white bg-dark mb-3 ">
      <a href="contenido.php?contenido=<?php echo $dato->nombre; ?>"> <img src="data:image;base64,<?php echo base64_encode($dato->img); ?>"></a>
				<div class="card-title ">
					<p class="line-clamp"><?php echo $dato->nombre;  ?></p>
					<a class="bi bi-plus-circle plus " href="agregaralista.php?contenido=<?php echo $dato->idpelicula; ?>"><svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
							<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
							<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
						</svg> <br> Mi lista</a>
				</div>
			</article>
		</main>
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
</html>

