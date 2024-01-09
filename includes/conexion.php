<?php
    $servidor="localhost";
    $usuario="root";
    $contrasena="";
    $bd="blog";
    $conexion=mysqli_connect($servidor,$usuario,"",$bd);

    if ($conexion){
        mysqli_query($conexion, "SET NAMES 'utf8'");
    } else {
        die("Error de conexión: ".mysqli_connect_error());
    }

    
?>