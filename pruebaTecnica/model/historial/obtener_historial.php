<?php
include('../../config/crud.php'); 

class obtener{
    private $base;

    function instancias(){
        $this->base = new Crud_bd();
        $this->base->conexion_bd();
    }

    function obtener_historial(){
        $querry1 = "SELECT DISTINCT
            h.fecha_hora,
            h.cantidad,
            h.tipo_movimiento,
            p.nombre AS producto,
            u.nombre AS usuario
        FROM 
            historial h,
            productos p,
            usuarios u
        WHERE 
            h.idproducto = p.idproducto
            AND h.correo = u.correo;";
        $resultados1 = $this->base->mostrar($querry1,[]);

        return $resultados1;
    }
}
   

?>