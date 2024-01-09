<?php
    session_start();
    
    if(isset($_POST)){
        require 'conexion.php';
        $registro=$_POST;
        $nombre=mysqli_real_escape_string($conexion,$registro['nombre']);
        $apellidos=mysqli_real_escape_string($conexion,$registro['apellidos']);
        $email=mysqli_real_escape_string($conexion,trim($registro['email']));
        $password=mysqli_real_escape_string($conexion,$registro['password']);

        $errores=array();
        
        if($nombre==""){
           array_push($errores,"El nombre no puede estar vacío");
        }
        if($apellidos==""){
            array_push($errores,"Los apellidos no puede estar vacíos");
         }
         if($email=="" || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            array_push($errores,"El email es incorrecto");
        }
        if(($password=="")||strlen($password)<8){
            array_push($errores,"La contraseña no puede estar vacía ni tener menos de 8 caracteres");
         }
        if (count($errores)==0){
            $password_segura=password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
            $sql= "INSERT INTO usuarios VALUES(null,'$nombre','$apellidos','$email','$password_segura',CURDATE())";
            $insertar=mysqli_query($conexion,$sql);
            if($insertar){
                $_SESSION['completado']='El registro se ha completado con éxito';
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
            $_SESSION['nombre']=$nombre;
            $_SESSION['apellidos']=$apellidos;
            $_SESSION['email-0']=$email;
            $_SESSION['password-0']=$password;
        }
        header('Location: ../index');
    }
  

    
?>