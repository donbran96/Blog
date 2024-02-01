<?php include 'header.php'; ?>
<div class="contenedor">
    <div class="principal">
        <h1>Entradas</h1>
        <?php
                    $entradas=getEntradas($conexion);
                ?>
                <?php foreach ($entradas as $entrada): ?>
                            <article class="entrada">
                                <a href="entrada?id=<?php echo str_replace(' ','_',strtolower($entrada['id'])) ?>">
                                    <h2><?php echo $entrada['titulo']; ?></h2>
                                    <p><?php echo $entrada['descripcion']; ?></p>
                                </a>
                                <div>
                                    <span><?php echo 'Categoría: <a href="categorias?id='. str_replace(' ','_',strtolower($entrada['id'])) .'">'.$entrada['categoria'].'</a>' ?></span>
                                    <span><?php echo 'Autor: '.$entrada['autor'] ?></span>
                                    <p><?php echo $entrada['fecha'] ?></p>
                                </div>
                            </article>
                       
                    <?php endforeach; ?>
    </div>
    <?php include 'includes/lateral.php'; ?>
</div>
<?php include 'footer.php'; ?>