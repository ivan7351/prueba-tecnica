<?php
include('../../config/crud.php'); 

class insertar{
    private $base;

    function instancias(){
        $this->base = new Crud_bd();
        $this->base->conexion_bd();
    }

    function insertar_inventario($nombre,$descripcion){

        $q1 = "INSERT INTO productos (nombre, descripcion, cantidad, estatus, accion) 
        VALUES (:nombre, :descripcion, 0, 1, 1)";
        $a1 = [":nombre"=>$nombre, ":descripcion"=>$descripcion];
        $querry = [$q1];
        $parametros = [$a1];
        $ejecucion = $this->base->insertar_eliminar_actualizar($querry, $parametros);
        return $ejecucion;
    }
}
   

?>