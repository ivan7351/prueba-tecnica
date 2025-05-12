<?php
include('../../config/crud.php'); 

class mostrarlogin{
    private $base;

    function instancias(){
        $this->base = new Crud_bd();
        $this->base->conexion_bd();
    }

    function log($user, $pass){
        $querry1 = "SELECT contrasena,correo,idrol FROM usuarios WHERE correo=:user and contrasena=:pass";
        $resultados1 = $this->base->mostrar($querry1,[":user"=>$user, ":pass"=>$pass]);

        return $resultados1;
    }
}

?>