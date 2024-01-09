<?php include 'header.php'; ?>
<?php include 'includes/redireccion.php'; ?>
<?php  

    $categorias=getCategorias($conexion);
?>
<div class="contenedor">
    <div class="principal">
        <h1>Crear entradas</h1>
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
        <form action="includes/guardar-entrada.php" method="post" class="crear_entrada">
            <label for="titulo">Nombre de la entrada:</label>
            <input type="text" name="titulo" id="titulo" value="<?php if (isset($_SESSION['titulo'])){ echo $_SESSION['titulo']; unset($_SESSION['titulo']); } ?>">
            <label for="descripcion">Descripción de la entrada:</label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10"><?php if (isset($_SESSION['descripcion'])){ echo $_SESSION['descripcion']; unset($_SESSION['descripcion']); } ?></textarea>
            <label for="">Elija 1 o más categorías para la entrada:</label>
            <?php
                if (!empty($categorias)) {
                    foreach ($categorias as $categoria) {
                        // Escapar el nombre de la categoría para evitar posibles problemas de seguridad
                        $categoriaNombre = htmlspecialchars($categoria['nombre']);
                        $categoriaId = $categoria['id'];
            ?>
                        <label class="categorias">
                        <input type="radio" name="categoria_seleccionada" value="<?php echo $categoriaId; ?>">
                        <?php echo $categoriaNombre; ?>
                        </label><?php
                    }
                } else {
                    echo 'No hay categorías disponibles.';
                }
            ?>
            <input type="submit" value="Crear Entrada">
        </form>
    </div>
    <?php include 'includes/lateral.php'; ?>
</div>
<?php include 'footer.php'; ?>