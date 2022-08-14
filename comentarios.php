<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/Wanoori/css/styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<form action="contenido.php?contenido=<?php echo $dato->nombre; ?>" method="POST">
    <div class="comentarios mensaje">
      <h3>Comentarios</h3>
      <textarea name ="comentario"  class="form-control" rows="3" ></textarea>
      <button type="submit">Comentar</button>
    </div>
  </form>
  <table class="table mensaje"> 
      <tr>
          <th style="text-align: center;">Usuario </th>
          <th colspan="2" style="text-align: center ;">Comentario</th>
          
      </tr>
      <tr>
          <td colspan="1" style="text-align: center ;">emir</td>
          <td colspan="2" style="text-align: center ;">holaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
      </tr>

  </table>
</body>
</html>