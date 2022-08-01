<?php

require_once('../../Conexion.php');

class Producto extends Conexion{

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function add($ID, $nombre, $precio_venta, $cantidad_stock, $unidad_medida, $descripcion){
        $statement = $this->db->prepare("INSERT INTO  producto (prod_codigo, prod_nombre, 
        prod_precio_venta, prod_cantidad_stock, prod_unidad_medida, prod_descripcion) 
        VALUES (:ID, :nombre, :precio_venta, :cantidad_stock, :unidad_medida, :descripcion)");
        $statement->bindParam(':ID', $ID);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':precio_venta', $precio_venta);
        $statement->bindParam(':cantidad_stock', $cantidad_stock);
        $statement->bindParam(':unidad_medida', $unidad_medida);
        $statement->bindParam(':descripcion', $descripcion);
        if($statement->execute()){
            header('Location ../../Producto/vista/CRUDUsuarios.php');
        }else{
            header('Location ../vista/CRUDUsuarios.php');
        }
    }

    public function get(){
        $rows = null;
        $statement = $this->db->prepare("SELECT * FROM  producto");
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;
    }

    public function getByID($ID){
        $rows = null;
        $statement = $this->db->prepare("SELECT * FROM  producto WHERE prod_codigo =:ID");
        $statement->bindParam(':ID',$ID);
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;
    }

    public function update($ID, $nombre, $precio_venta, $cantidad_stock, $unidad_medida, $descripcion){
        $statement = $this->db->prepare("UPDATE producto SET prod_codigo = :ID, prod_nombre = :nombre,
        prod_precio_venta = :precio_venta, prod_cantidad_stock = :cantidad_stock, prod_unidad_medida = :unidad_medida,
        prod_descripcion = :descripcion WHERE prod_codigo =:ID");
        $statement->bindParam(':ID', $ID);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':precio_venta', $precio_venta);
        $statement->bindParam(':cantidad_stock', $cantidad_stock);
        $statement->bindParam(':unidad_medida', $unidad_medida);
        $statement->bindParam(':descripcion', $descripcion);
        if($statement->execute()){
            header('Location: ../Pages/index.php');
        }else{
            header('Location: ../Pages/edit.php');
        }
    }

    public function delete($ID){
        $statement = $this->db->prepare("DELETE FROM producto WHERE vent_codigo = :ID ");
        $statement->bindParam(':ID',$ID);
        if($statement->execute()){
            header('Location: ../Pages/index.php');
        }else{
            header('Location: ../Pages/delete.php');
        }
    }
    



}
 
?>