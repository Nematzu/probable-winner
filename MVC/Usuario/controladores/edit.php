<?php

require_once('../modelo/Usuario.php');

if($_POST){
    $ModeloUsuarios = new Usuario();

    $usua_codigo = $_POST['usua_codigo'];
    $Identificacion = $_POST['Identificacion'];
    $Tipo_Identificacion = $_POST['Tipo_Identificacion'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Celular = $_POST['Celular'];
    $Direccion = $_POST['Direccion'];
    $Password = $_POST['Password'];
    $Estado = $_POST['Estado'];


    $ModeloUsuarios->update($usua_codigo, $Identificacion, $Tipo_Identificacion, $Nombre, $Apellido, $Celular, $Direccion, $Password, $Estado);
}else{
    header('Location ../../index.php');
}

?>