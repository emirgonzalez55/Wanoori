<?php

  session_start();

  if (isset($_SESSION['user_id'])) {

  }else
  header("Location:index.php");
 ?> 
<!doctype html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="/Wanoori/css/styles.css" rel="stylesheet">
  </head>
<body>  
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/Wanoori/inicio.php">WANOORI</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" href='/Wanoori/inicio.php' aria-current="page" href="#">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Wanoori/peliculas.php">Peliculas</a>  
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Wanoori/series.php">Series</a>  
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Wanoori/juegos.php">Juegos</a>  
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Wanoori/milista.php">Mi lista</a>  
        </li>
      </ul>
      <form class="d-flex" action="/Wanoori/consultas.php" method="POST" >
        <input type="search" required name ="consulta" pattern="[A-Za-z0-9\s_-]{1,100}"  class="form-control me-2 Search " id="floatingInput" placeholder="Buscar">
        <button class="btn btn-outline-success buscar" type="submit">Buscar</button>
      </form>
      <div class="dropdown text-end">
          <a href="" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="/Wanoori/img/login.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-lg-end " aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item " href="#">Usuario:
            <?php print_r($_SESSION['user_id']); ?>
            </a></li>
            <li><a class="dropdown-item" href="#" id="boton">Modo oscuro</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item active" href="/Wanoori/logout.php">Cerrar sesion</a></li>
          </ul>
        </div>
      </div>
    </div>
</nav>

<div class=" lead ">
  <footer class="py-2 lead">
    <div class="">
      <span class="">&copy; 2022 Emir S.A</span>
    </div>
  </footer>
</div>


 
    <script src="/Wanoori/css/modo.js"></script>
    <script src="/Wanoori/css/bootstrap.bundle.min.js"></script>
</body>
</html>


