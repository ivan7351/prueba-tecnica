<?php
include_once('../../model/login/login.php');

session_start();
$base = new mostrarlogin();
$base->instancias();


// Obtener datos del formulario
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$res = $base->log($username,$password);

// Validar campos
if (isset($res[0])){
if ($username == $res[0][1] && $password == $res[0][0]) {
    // Iniciar sesión y redirigir
    $_SESSION['usuario'] = $username;
    if ($res[0][2] == "1"){
        header('Location: ../../view/inventario/inventario.html');
    }else{
        header('Location: ../../view/inventario/inventario_almacenista.html');
    } 
    exit;
}} else {
    header('Location: ../../view/login/error.html');
}

?>