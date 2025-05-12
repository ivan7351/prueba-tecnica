<?php
include_once('../../model/historial/obtener_historial.php');

    $base = new obtener();
    $base->instancias();

    $res = $base->obtener_historial();
    echo json_encode($res);


?>