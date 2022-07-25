<?php

require_once('../modelo/Producto.php');

if($_POST){
    $ModeloProductos = new Producto();


    $ID = $_POST['ID'];
    $nombre = $_POST['nombre'];
    $precio_venta = $_POST['precio_venta'];
    $cantidad_stock = $_POST['cantidad_stock'];
    $unidad_medida = $_POST['unidad_medida'];
    $descripcion = $_POST['descripcion'];

    


    $ModeloProductos->add($ID, $nombre, $precio_venta, $cantidad_stock, $unidad_medida, $descripcion);
}else{
    header('Location ../../index.php');
}

?>