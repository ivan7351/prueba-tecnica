<?php
include('../../config/crud.php'); 

class obtener{
    private $base;

    function instancias(){
        $this->base = new Crud_bd();
        $this->base->conexion_bd();
    }

    function obtener_inventario(){
        $querry1 = "SELECT idproducto,nombre,descripcion,cantidad, estatus FROM productos";
        $resultados1 = $this->base->mostrar($querry1,[]);

        return $resultados1;
    }
}
   

?>