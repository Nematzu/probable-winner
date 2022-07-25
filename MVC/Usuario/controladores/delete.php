<?php

require_once('../modelo/Usuario.php');

if($_POST){
    $Modelo = new Usuario();

    $usua_codigo = $_POST['usua_codigo'];
    $Modelo->delete($usua_codigo);
}
else{
    header('Location ../../index.php');
}
?>