<?php

require_once('../modelo/Usuario.php');

if($_POST){
    $Usuario = $_POST['Usuario'];
    $Password = $_POST['Contrasena'];

    $Modelo = new Usuario();
    if ($Modelo->login($Usuario, $Password)){
        header('Location: ../../Usuario/vista/CRUDUsuarios.php');
    }else{
        header('Location: ../../login.php');
    }
    
}else{
    header('Location: ../../login.php');
}

?>