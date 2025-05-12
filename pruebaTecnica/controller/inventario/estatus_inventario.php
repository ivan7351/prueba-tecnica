<?php
include_once('../../model/inventario/estatus_inventario.php');

if (isset($_POST['productoId']) && isset($_POST['nuevoEstatus'])) {
    $productoId = $_POST['productoId'];
    $estatus = $_POST['nuevoEstatus'];

    
    $base = new estatus();
    $base->instancias();
    
    
    $res = $base->estatus_inventario($productoId,$estatus);

    if ($res==true){
        echo "Actualizacion exitosa";
    }else{
        echo "Intentelo mas tarde";
    }

} 



?>