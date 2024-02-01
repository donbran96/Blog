<?php session_start(); ?>
<?php include 'includes/conexion.php'; ?>
<?php include 'includes/consultas.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/efectos.js" defer></script>
</head>
<body>
    <div class="contenedor-principal">
        <header class="header">
            <div class="logo">
                <a href="index">
                    <h2>Blog</h2>    
                </a>
            </div>
            <?php  $categorias=getCategorias($conexion); 
                //var_dump($categorias);
            ?>
            <nav class="menu">
                <ul>
                    <li>
                        <a href="index">Inicio</a>
                    </li>
                    <?php
                        foreach ($categorias as $categoria) {
                            ?>
                            <li>
                                <a href="categorias?id=<?php echo str_replace(' ','_',strtolower($categoria['id'])); ?>"><?php echo $categoria['nombre']; ?></a>
                            </li>
                            <?php
                        }
                    ?>
                    <li>
                        <a href="">Sobre mí</a>
                    </li>
                    <li>
                        <a href="">Contacto</a>
                    </li>
                </ul>
            </nav>
        </header>