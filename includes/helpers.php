<?php

function mostrarErrores($errores,$campos){
    $alerta='';
if (isset($errores[$campos]) && !empty($campos)){

    $alerta="<div class='alerta alerta-error'>".$errores[$campos].'</div>';

}

return $alerta;
}


function borrarErrores(){
$borrado=false;
    if(isset($_SESSION['errores'])){
        $_SESSION['errores'] = null;
       

    }

        if(isset($_SESSION['completado'])){
            $_SESSION['completado'] = null;   
            $borrado = session_unset();
        }
        
        return $borrado;
}


function listarCategorias($conexion){
    $sql="select * from categorias order by id asc";
    $categorias = mysqli_query($conexion,$sql);
    //$resultado=false;
    $resultado = array();
    if($categorias && mysqli_num_rows($categorias)>=1){
    $resultado=$categorias;
   
    }
    return $resultado;
    
   
}

function listarUltimasEntradas($conexion){
    $sql="select e.*,c.nombre as 'categoria' from entradas e inner join categorias c on e.categorias_id=c.id order by e.id desc";
    $entradas = mysqli_query($conexion,$sql);
    //$resultado=false;
    $resultado = array();
    if($entradas && mysqli_num_rows($entradas)>=1){
    $resultado=$entradas;
   
    }
    return $entradas;
    
   
}




?>