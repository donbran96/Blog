<?php include 'header.php'; ?>
        <div class="contenedor">
            <div class="principal">
                <h1>Últimas entradas</h1>
                <?php
                    $entradas=getEntradas($conexion);
                    //var_dump($entradas);
                ?>
                <?php
                    for ($contador=0; $contador < 6; $contador++) { 
                        ?>
                            <article class="entrada">
                                <a href="">
                                    <h2><?php echo $entradas[$contador]['titulo']; ?></h2>
                                    <p><?php echo $entradas[$contador]['descripcion']; ?></p>
                                </a>
                                <div>
                                    <span><?php echo 'Categoría: <a href="categorias/'. str_replace(' ','_',strtolower($categoria['nombre'])) .'">'.$entradas[$contador]['categoria'].'</a>' ?></span>
                                    <span><?php echo 'Autor: '.$entradas[$contador]['autor'] ?></span>
                                    <p><?php echo $entradas[$contador]['fecha'] ?></p>
                                </div>
                            </article>
                        <?php
                    }
                ?>
                <div class="ver_todas">
                    <a>Ver todas las Entradas</a>        
                </div>
            </div>
            <?php include 'includes/lateral.php'; ?>
        </div>
<?php include 'footer.php'; ?>