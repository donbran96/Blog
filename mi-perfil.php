<?php include 'header.php'; ?>
<?php include 'includes/redireccion.php'; ?>
<?php
    $mis_datos=$_SESSION['usuario'];
?>
<div class="contenedor">
    <div class="principal">
        <h1>Mi Perfil</h1>
        <div class="datos">
            <p>Nombre: <?php echo $mis_datos['nombre']; ?></p>
            <p>Apellidos: <?php echo $mis_datos['apellidos']?></p>
            <p>Correo Electrónico: <?php echo $mis_datos['email']?></p>
            <p>Fecha de registro: <?php echo $mis_datos['fecha'] ?></p>
        </div>
        
                    <h3 class="actualizacion">Editar Datos</h3>
                    <?php
                        if(isset($_SESSION['completado'])){
                            echo "<span class=error>{$_SESSION['completado']}</span>";
                            unset($_SESSION['completado']);
                        }
                    ?>
                    <?php
                        if(isset($_SESSION['errores'])){
                            foreach ($_SESSION['errores'] as $error) {
                                echo "<span class='error'>$error</span><br>";
                            }
                            unset($_SESSION['errores']);
                        }
                    ?>
                    <form action="includes/actualizar-usuario.php" method="post" class="actualizacion">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="<?php echo $mis_datos['nombre']; ?>">
    
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos" value="<?php echo $mis_datos['apellidos']; ?>">
                        
                        <label for="email-0">Email</label>
                        <input type="email" name="email" id="email-0" value="<?php echo $mis_datos['email']; ?>">
    
                        <input type="submit" value="Actualizar Datos">
                    </form>
    </div>
    <?php include 'includes/lateral.php'; ?>
</div>
<?php include 'footer.php'; ?>


