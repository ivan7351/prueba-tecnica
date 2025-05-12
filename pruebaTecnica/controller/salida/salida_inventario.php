<?php
include_once('../../model/salida/salida_inventario.php');

if (isset($_POST['producto']) && isset($_POST['cantidad'])) {
    $productoId = intval($_POST['producto']);
    $cantidad = intval($_POST['cantidad']);

    session_start();
    $userId = $_SESSION['usuario'];

    $base = new salida();
    $base->instancias();
    $stock = $base->stock($productoId);
     if ($stock[0][0] - $cantidad >= 0){
        $res = $base->salida_inventario($productoId,$cantidad,$userId);
        echo "Operacion exitosa";
    }else{
        echo "No hay suficiente cantidad";
    }
} 



?>