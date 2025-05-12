<?php
include_once('../../model/inventario/entrada_inventario.php');

if (isset($_POST['productoId']) && isset($_POST['cantidad'])) {
    $productoId = $_POST['productoId'];
    $cantidad = $_POST['cantidad'];

    
    $base = new entrada();
    $base->instancias();
    
    session_start();
    $userId = $_SESSION['usuario'];

    $res = $base->entrada_inventario($productoId,$cantidad,$userId);
    if ($res==true){
        echo "Actualizacion exitosa";
    }else{
        echo "Intentelo mas tarde";
    }

} 



?>