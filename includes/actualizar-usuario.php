<?php

    session_start();
    if(isset($_POST)){
        include 'conexion.php';
        include 'consultas.php';
        $actualizacion=$_POST;
        $user_id=$_SESSION['usuario']['id'];
        $consulta_usuario="SELECT nombre,apellidos,email FROM usuarios WHERE id=$user_id";
        $usuario_actual=mysqli_query($conexion,$consulta_usuario);
        $usuario_actual0=mysqli_fetch_assoc($usuario_actual);
        var_dump($actualizacion);
        var_dump($usuario_actual0);
        $errores=array();
        $diferencias = array_diff($actualizacion, $usuario_actual0);

        if (empty($diferencias)) {
            header('Location: ../mi-perfil');
        } else{
            $nombre=mysqli_real_escape_string($conexion,$actualizacion['nombre']);
            $apellidos=mysqli_real_escape_string($conexion,$actualizacion['apellidos']);
            $email=mysqli_real_escape_string($conexion,$actualizacion['email']);
            $user_id=$_SESSION['usuario']['id'];
            if($nombre==""){
                array_push($errores,"El nombre está vacío");
            }
            if($apellidos==""){
                array_push($errores,"Los apellidos están vacíos");
            }
            if($email=="" || !filter_var($email, FILTER_VALIDATE_EMAIL)){
                array_push($errores,"El email es incorrecto");
            }
            if (count($errores)==0){
                $sql= "UPDATE usuarios
                        SET nombre='$nombre',
                            apellidos='$apellidos',
                            email='$email'
                        WHERE id=$user_id";
                $insertar=mysqli_query($conexion,$sql);
                if($insertar){
                    $_SESSION['completado']='Actualizado correctamente';
                    $consulta="SELECT * FROM usuarios WHERE id=$user_id";
                    $login_nuevo=mysqli_query($conexion,$consulta);
                    $usuario=mysqli_fetch_assoc($login_nuevo);
                    $_SESSION['usuario']=$usuario;
                }else{
                    if (mysqli_errno($conexion) == 1062) {
                        $_SESSION['completado'] = 'El email ya está registrado.';
                    } else{
                        $_SESSION['completado']='Fallo al guardar el usuario: '. mysqli_error($conexion);
                    }
                }
               // var_dump(password_verify($password,$password_segura));
            }else{
                $_SESSION['errores']=$errores;
            }
            header('Location: ../mi-perfil');
        }

       
    }

?>