<?php
include_once('../../model/salida/obtener_productos.php');

    $base = new obtener();
    $base->instancias();

    $res = $base->obtener_inventario();
    echo json_encode($res);


?>