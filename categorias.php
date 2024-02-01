<?php include 'header.php'; ?>
<?php
    $nombreCat=getCategoria($_GET['id'],$conexion);
    
?>
<div class="contenedor">
    <div class="principal">
        <?php if($nombreCat!=null): ?>
            <h1><?php $nombreCat=$nombreCat['nombre']; $nombre= str_replace('_',' ',ucwords($nombreCat)); echo $nombre; ?></h1>
            <?php $entradas=getEntradasByCategory($_GET['id'],$conexion); ?>
            <?php if(count($entradas)>0): ?>
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
            <?php else: ?>
                <p>La categoría no contiene entradas</p>
            <?php endif; ?>
         <?php else: ?>
            <p>Esta categoría no existe</p>
        <?php endif; ?>
    </div>
    <?php include 'includes/lateral.php'; ?>
</div>
<?php include 'footer.php'; ?>