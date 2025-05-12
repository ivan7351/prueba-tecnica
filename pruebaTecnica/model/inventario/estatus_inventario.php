<?php
include('../../config/crud.php'); 

class estatus{
    private $base;

    function instancias(){
        $this->base = new Crud_bd();
        $this->base->conexion_bd();
    }

    function estatus_inventario($id,$estatus){
        $consulta = "UPDATE productos SET estatus = :estatus 
        WHERE idproducto=:id";
      
        $parametros = [":id"=>$id, ":estatus"=>$estatus];
  
        $res = $this->base->insertar_eliminar_actualizar($consulta,$parametros);
        return $res;
    }
}
   

?>