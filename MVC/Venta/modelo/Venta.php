<?php

require_once('../../Conexion.php');

class VENTA  extends Conexion{

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function add($ID, $fecha, $total, $cantidad_total){
        $statement = $this->db->prepare("INSERT INTO  venta (vent_codigo, vent_fecha, 
        vent_total, vent_cantidad_total) 
        VALUES (:ID, :fecha, :total, :cantidad_total,)");
        $statement->bindParam(':ID', $ID);
        $statement->bindParam(':fecha', $fecha);
        $statement->bindParam(':total', $total);
        $statement->bindParam(':cantidad_total', $cantidad_total);
        if($statement->execute()){
            header('Location ../Pages/index.php');
        }else{
            header('Location ../Pages/add.php');
        }
    }

    public function get(){
        $rows = null;
        $statement = $this->db->prepare("SELECT * FROM  venta");
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;
    }

    public function getByID($ID){
        $rows = null;
        $statement = $this->db->prepare("SELECT * FROM  venta WHERE vent_codigo =:ID");
        $statement->bindParam(':ID',$ID);
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;
    }

    public function update($ID, $fecha, $total, $cantidad_total){
        $statement = $this->db->prepare("UPDATE venta SET vent_codigo = :ID, vent_fecha = :fecha,
        vent_total = :total, vent_cantidad_total = :cantidad_total WHERE vent_codigo =:ID");
        $statement->bindParam(':ID', $ID);
        $statement->bindParam(':fecha', $fecha);
        $statement->bindParam(':total', $total);
        $statement->bindParam(':cantidad_total', $cantidad_total);
        if($statement->execute()){
            header('Location: ../Pages/index.php');
        }else{
            header('Location: ../Pages/edit.php');
        }
    }

    public function delete($ID){
        $statement = $this->db->prepare("DELETE FROM venta WHERE prod_codigo = :ID ");
        $statement->bindParam(':ID',$ID);
        if($statement->execute()){
            header('Location: ../Pages/index.php');
        }else{
            header('Location: ../Pages/delete.php');
        }
    }
    



}
 
?>