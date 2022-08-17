<?php

    $server = 'localhost';
    $username = 'root';
    $password = '';
    $bd = 'wanooribd';

    try {
        $conexion = new PDO("mysql:host=$server;dbname=$bd;", $username, $password);
    } catch (PDOException $error) {
      die('La conexión fallo: '.$error->getMessage());
    }


?>
