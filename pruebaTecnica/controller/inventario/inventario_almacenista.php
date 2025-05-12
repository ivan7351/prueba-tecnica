<?php
include_once('../../model/inventario/inventario_almacenista.php');

    $base = new obtener();
    $base->instancias();

    $res = $base->obtener_inventario();
    echo json_encode($res);


?>