<?php
    

    
    function getCategorias($conexion){
        $sql = "SELECT * FROM categorias";
        $categorias = mysqli_query($conexion, $sql);
    
        $result = array(); // Inicializa un array para almacenar todas las categorías
        
        while ($row = mysqli_fetch_assoc($categorias)) {
            $result[] = $row; // Agrega cada fila al array resultante
        }
        
        return $result;
    }
    function getEntradas($conexion){
        $sql = "SELECT e.id as 'id', e.fecha as 'fecha', e.titulo as 'titulo', e.descripcion as 'descripcion', c.nombre as 'categoria', CONCAT(u.nombre,' ',u.apellidos) as 'autor' 
        FROM categorias c INNER JOIN entradas e on e.categoria_id=c.id INNER JOIN usuarios u on e.usuario_id=u.id ORDER by e.id;";
        $entradas = mysqli_query($conexion, $sql);
        $result=array();
        while($row = mysqli_fetch_assoc($entradas)){
            $result[] = $row;
        }
        return $result;
    }

?>