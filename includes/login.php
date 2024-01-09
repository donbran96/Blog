<?php
session_start();
include 'conexion.php';

if (isset($_POST)){
    $email=trim($_POST['email']);
    $password=$_POST['password'];
    $errores0=array();
    if($email=="" || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errores0,"El email es incorrecto");
    }
    if($password==""){
        array_push($errores0,'Ingrese la contraseña');
    }
    if(count($errores0)==0){
        $sql="SELECT * from usuarios WHERE email='$email'";
        $login=mysqli_query($conexion,$sql);
        $filas=mysqli_num_rows($login);
        if($filas>0){
            $usuario=mysqli_fetch_assoc($login);
            if(password_verify($password,$usuario['password'])){
                $_SESSION['usuario']=$usuario;
            } else {
                $_SESSION['login']='Contraseña incorrecta';
                $_SESSION['email_login']=$email;
            }
        }  else{
            $_SESSION['login']='El email no existe';
        }  
    } else {
        $_SESSION['errores0']=$errores0;
        $_SESSION['email_login']=$email;
    }
    header('Location: ../index');
}

?>