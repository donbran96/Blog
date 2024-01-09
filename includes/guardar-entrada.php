<?php

    session_start();
    if(isset($_POST)){
        require 'conexion.php';
        $entrada=$_POST;
        $titulo=mysqli_real_escape_string($conexion,$entrada['titulo']);
        $descripcion=mysqli_real_escape_string($conexion,$entrada['descripcion']);
        $categoria=mysqli_real_escape_string($conexion,$entrada['categoria_seleccionada']);
        $usuario_id=$_SESSION['usuario']['id'];
        $errores=array();
        if($titulo==""){
           array_push($errores,"El Título no puede estar vacío");
        }
        if($descripcion==""){
            array_push($errores,"La descripción no puede estar vacía");
        }
        if($categoria==""){
            array_push($errores,"Elija una categoría");
        }
        if (count($errores)==0){
            
            $sql= "INSERT INTO entradas VALUES(null,'$usuario_id','$categoria','$titulo','$descripcion',CURDATE())";
            $insertar=mysqli_query($conexion,$sql);
            if($insertar){
                $_SESSION['completado']='La entrada se ha registrado correctamente';
            }else{
                $_SESSION['completado']='Fallo al guardar la entrada: '. mysqli_error($conexion);
            }
        }else{
            $_SESSION['errores']=$errores;
            $_SESSION['titulo']=$titulo;
            $_SESSION['descripcion']=$descripcion;
        }
        header('Location: ../crear-entrada');
    }

?>