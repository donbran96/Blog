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
    function getCategoria($id,$conexion){
        $sql = "SELECT nombre FROM categorias WHERE id=$id";
        $categoria = mysqli_query($conexion, $sql);

        $result = mysqli_fetch_assoc($categoria); // Inicializa un array para almacenar todas las categorías
        
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
    function getUserIdByEntrada($id,$conexion){
        $sql="SELECT usuario_id FROM entradas WHERE id=$id";
        $id=mysqli_query($conexion,$sql);
        $result=mysqli_fetch_assoc($id);
        return $result;
    }
    function getEntrada($id,$conexion){
        $sql = "SELECT e.id as 'id', e.fecha as 'fecha', e.titulo as 'titulo', e.descripcion as 'descripcion', c.nombre as 'categoria', CONCAT(u.nombre,' ',u.apellidos) as 'autor' 
        FROM categorias c INNER JOIN entradas e on e.categoria_id=c.id INNER JOIN usuarios u on e.usuario_id=u.id WHERE e.id=$id ORDER by e.id;";
        $entradas = mysqli_query($conexion, $sql);
        $result=mysqli_fetch_assoc($entradas);
        return $result;
    }
    function getEntradasByCategory($id,$conexion){
        $sql = "SELECT e.id as 'id', e.fecha as 'fecha', e.titulo as 'titulo', e.descripcion as 'descripcion', c.nombre as 'categoria', CONCAT(u.nombre,' ',u.apellidos) as 'autor' 
        FROM categorias c INNER JOIN entradas e on e.categoria_id=c.id INNER JOIN usuarios u on e.usuario_id=u.id WHERE c.id=$id ORDER by e.id;";
        $entradas = mysqli_query($conexion, $sql);
        $result=array();
        while($row = mysqli_fetch_assoc($entradas)){
            $result[] = $row;
        }
        return $result;
    }

?>