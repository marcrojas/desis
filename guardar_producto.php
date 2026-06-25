<?php

require_once("sql.php");

$busca_codigo = buscar_codigo($_POST['codigo']);

if($busca_codigo){
    echo "existe";
}else{

    $resultado = guardar_producto($_POST);

    if($resultado === true){

        echo "ok";

    }else{

        echo $resultado;

    }

}


?>