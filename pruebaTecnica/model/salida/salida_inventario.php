<?php
include('../../config/crud.php'); 

class salida{
    private $base;

    function instancias(){
        $this->base = new Crud_bd();
        $this->base->conexion_bd();
    }

    function salida_inventario($id,$cantidad,$user){
        $consulta = "UPDATE productos SET cantidad = cantidad - :cantidad 
        WHERE idproducto=:id";
        $parametros = [":id"=>$id, ":cantidad"=>$cantidad];

        $consulta2 = "INSERT INTO historial (idproducto,tipo_movimiento,cantidad,correo) 
        VALUES (:prod, 2, :can, :correo)";
        $parametros2 = [":prod"=>$id, ":can"=>$cantidad, ":correo"=>$user];


        $querry = [$consulta,$consulta2];
        $param = [$parametros,$parametros2];
  
        $res = $this->base->insertar_eliminar_actualizar($querry,$param);
        return $res;
    }
     function stock($id){
        $querry1 = "SELECT cantidad FROM productos where idproducto = :id";
        $resultados1 = $this->base->mostrar($querry1,[":id"=>$id]);

        return $resultados1;
    }
}
   

?>