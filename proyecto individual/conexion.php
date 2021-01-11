<?php
$connection = new mysqli('localhost', 'root', '', 'proyecto_individual');
     if ($connection->connect_errno) {
         die("No hay conexion  a la base de datos");
     } else {
        $sql = "SELECT * FROM alumnos";
        $resultado = $connection->query($sql);
     }
?>