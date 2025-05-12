<?php
include_once('../../model/inventario/obtener_inventario.php');

    $base = new obtener();
    $base->instancias();

    $res = $base->obtener_inventario();
    echo json_encode($res);


?>