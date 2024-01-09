<?php include 'header.php'; ?>
<?php include 'includes/redireccion.php'; ?>
<?php
    $mis_datos=$_SESSION['usuario'];
    var_dump($mis_datos);
?>
<div class="contenedor">
    <div class="principal">
        <h1>Mi Perfil</h1>
        
    </div>
    <?php include 'includes/lateral.php'; ?>
</div>
<?php include 'footer.php'; ?>


