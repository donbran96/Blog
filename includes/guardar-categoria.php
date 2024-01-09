<?php

    session_start();
    if(isset($_POST)){
        require 'conexion.php';
        require 'consultas.php';
        $categorias=getCategorias($conexion);
        $categoria_nueva=$_POST['categoria'];
        $existe=false;
        $categoria_nueva=trim($categoria_nueva);
      

        if ($categoria_nueva=='') {
            $_SESSION['cat_existe']='La Categoría está vacía';
        } else {
            if (preg_match('/\d/', $categoria_nueva)) {
                $_SESSION['cat_existe']='La categoría no puede contener números';
            } else {
                $categoria_nueva = ucwords($categoria_nueva);
                foreach ($categorias as $categoria) {
                    if(strtolower($categoria['nombre'])==strtolower($categoria_nueva)){
                        $existe=true;
                    }
                }
                if($existe){
                    $_SESSION['cat_existe']='La Categoría ya existe';
                } else{
                    $sql="INSERT INTO categorias VALUES(null,'$categoria_nueva')";
                    $insertar=mysqli_query($conexion,$sql);
                    if($insertar){
                        $_SESSION['cat_existe']='Categoría añadida correctamente';
                    }else{
                       
                        $_SESSION['cat_existe']='Fallo al guardar el usuario: '. mysqli_error($conexion);
                
                    }
                    
                }
            }
        }
        header('Location: ../crear-categoria');
    }

?>