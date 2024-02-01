<?php include 'header.php'; ?>
<?php
    $entrada=getEntrada($_GET['id'],$conexion);
    $id_usuario=getUserIdByEntrada($_GET['id'],$conexion);
    $categorias=getCategorias($conexion);
?>
<div class="contenedor">
    <div class="principal">
        <?php if($entrada!=null): ?>
            <article class="entrada_single" id="entrada">
                
                    <h1 class="titulo_entrada"><?php echo $entrada['titulo']; ?></h1>
                    <p><?php echo $entrada['descripcion']; ?></p>
               
                <div>
                    <span><?php echo 'Categoría: <a href="categorias?nombre='. str_replace(' ','_',strtolower($entrada['categoria'])) .'">'.$entrada['categoria'].'</a>' ?></span>
                    <span><?php echo 'Autor: '.$entrada['autor'] ?></span>
                                    <p><?php echo $entrada['fecha'] ?></p>
                </div>
            </article>
            <article class="entrada_single" id="entrada_edicion">
                <form action="" class="update_form">
                    <label for="titulo">Título de la entrada</label>
                    <input type="text" name="titulo" id="titulo" value="<?php echo $entrada['titulo'] ?>">

                    <label for="descripcion">Descripción de la entrada</label>
                    <textarea name="descripcion" id="descripcion" cols="30" rows="10"><?php echo $entrada['descripcion'] ?></textarea>
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
                </form>                
            </article>
            <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['id']==$id_usuario['usuario_id'] ): ?>
                <div class="ver_todas edicion">
                    <button id="editar_entrada">Editar entrada</button>  
                    <button id="guardar_entrada">Guardar entrada</button>
                    <button id="cancelar">Cancelar</button>        
                </div>
            <?php endif; ?>
        <?php else: ?>
            <p>Esta entrada no existe</p>
        <?php endif; ?>
    </div>
    <?php include 'includes/lateral.php'; ?>
</div>
<?php include 'footer.php'; ?>