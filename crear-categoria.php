<?php include 'header.php'; ?>
<?php include 'includes/redireccion.php'; ?>
<div class="contenedor">
    <div class="principal">
        <h1>Crear categorías</h1>
        <?php
            if(isset($_SESSION['cat_existe'])){
                echo "<span class='error'>{$_SESSION['cat_existe']}</span><br>";
                unset($_SESSION['cat_existe']);
        }
        ?>
        <form action="includes/guardar-categoria.php" method="post" class="crear_categoria">
            <input type="text" name="categoria" id="categoria">
            <input type="submit" value="Crear Categoría">
        </form>
    </div>
    <?php include 'includes/lateral.php'; ?>
</div>
<?php include 'footer.php'; ?>