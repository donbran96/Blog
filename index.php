<?php include 'header.php'; ?>
        <div class="contenedor">
            <div class="principal">
                <h1 class="titulo">Últimas entradas</h1>
                <?php
                    $entradas=getEntradas($conexion);
                    //var_dump($entradas);
                ?>
                <?php
                    for ($contador=0; $contador < 3; $contador++) { 
                        ?>
                            <article class="entrada">
                                <a href="entrada?id=<?php echo str_replace(' ','_',strtolower($entradas[$contador]['id'])) ?>">
                                    <h2><?php echo $entradas[$contador]['titulo']; ?></h2>
                                    <p><?php echo $entradas[$contador]['descripcion']; ?></p>
                                </a>
                                <div>
                                    <span><?php echo 'Categoría: <a href="categorias?id='. str_replace(' ','_',strtolower($entradas[$contador]['id'])) .'">'.$entradas[$contador]['categoria'].'</a>' ?></span>
                                    <span><?php echo 'Autor: '.$entradas[$contador]['autor'] ?></span>
                                    <p><?php echo $entradas[$contador]['fecha'] ?></p>
                                </div>
                            </article>
                        <?php
                    }
                ?>
                <div class="ver_todas">
                    <a href="entradas">Ver todas las Entradas</a>        
                </div>
            </div>
            <?php include 'includes/lateral.php'; ?>
        </div>
<?php include 'footer.php'; ?>