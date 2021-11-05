<a href="contenido/peliculas/matrix.php">  <img class="img-fluid" width="260" height="370" src="contenido/peliculas/img/matrix.png" ></a>
<a href="contenido/series/gotoubun.php">  <img  class="img-fluid" width="260" height="370"  src="contenido/series/img/gotoubun.jpg" ></a>
<a href="contenido/peliculas/matrix.php">  <img class="img-fluid" width="260" height="370" src="contenido/peliculas/img/matrix.png" ></a>

<main class="grid ">
  <article class="text-white bg-dark mb-3" >
  <a href="contenido/peliculas/matrix.php">  <img  src="contenido/peliculas/img/matrix.png" ></a>

    <div class="card-title ">
      <p><td><?php  echo $dato->nombre;  ?></td></p>
      <td><a class="btn btn-success " href="testagregar.php?idpelicula=<?php echo $dato->idpelicula; ?>">Agregar a mi lista </a></td>  

    </div>
  </article>
  <article class="text-white bg-dark mb-3" >
  <a href="contenido/peliculas/matrix.php">  <img  src="contenido/peliculas/img/matrix.png" ></a>

    <div class="card-title ">
      <p><td><?php  echo $dato->nombre;  ?></td></p>
      <td><a class="btn btn-success " href="testagregar.php?idpelicula=<?php echo $dato->idpelicula; ?>">Agregar a mi lista </a></td>  

    </div>
  </article>

  <article class="text-white bg-dark mb-3" >
  <a href="contenido/peliculas/matrix.php">  <img  src="contenido/peliculas/img/matrix.png" ></a>

    <div class="card-title ">
      <p><td><?php  echo $dato->nombre;  ?></td></p>
      <td><a class="btn btn-success " href="testagregar.php?idpelicula=<?php echo $dato->idpelicula; ?>">Agregar a mi lista </a></td>  

    </div>
  </article>


</main>                
<main class="grid ">
  <article class="text-white bg-dark mb-3" >
  <td><?php echo  $dato->imagen; ?></td> 
    <div class="card-title ">
      <p><td><?php  echo $dato->nombre;  ?></td></p>
      <td><a class="btn btn-success " href="testagregar.php?idpelicula=<?php echo $dato->idpelicula; ?>">Agregar a mi lista </a></td>  

    </div>
  </article>
</main>