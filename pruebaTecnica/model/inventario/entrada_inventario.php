<?php
include('../../config/crud.php'); 

class entrada{
    private $base;

    function instancias(){
        $this->base = new Crud_bd();
        $this->base->conexion_bd();
    }

    function entrada_inventario($id,$cantidad,$user){
        $consulta = "UPDATE productos SET cantidad = cantidad + :cantidad 
        WHERE idproducto=:id";
      
        $parametros = [":id"=>$id, ":cantidad"=>$cantidad];

        $consulta2 = "INSERT INTO historial (idproducto,tipo_movimiento,cantidad,correo) 
        VALUES (:prod, 1, :can, :correo)";
      
        $parametros2 = [":prod"=>$id, ":can"=>$cantidad, ":correo"=>$user];
        
        $querry = [$consulta,$consulta2];
        $param = [$parametros,$parametros2];

        $res = $this->base->insertar_eliminar_actualizar($querry,$param);
        return $res;
    }
}
   

?>