<?php
include_once('../../model/inventario/agregar_inventario.php');
// Validar que se recibieron los datos necesarios
if (isset($_POST['nombre']) && isset($_POST['descripcion'])) {
    $nombre = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);

    $base = new insertar();
    $base->instancias();

    $res = $base->insertar_inventario($nombre,$descripcion);
    if ($res==true){
        echo "Registro exitoso";
    }else{
        echo "Intentelo mas tarde";
    }

} 
?>
