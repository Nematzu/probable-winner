<?php

require_once('../../Conexion.php');

class Cliente extends Conexion{

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function add($Identificacion, $tipo_identificacion, $nombre, $apellido, $celular, $direccion){
        $statement = $this->db->prepare("INSERT INTO  cliente (clie_Identificacion, clie_tipo_identificacion, 
        clie_nombre, clie_apellido, clie_celular, clie_direccion) VALUES (:identificacion, :tipo_identificacion, :nombre, :apellido, :celular, :direccion)");
        $statement->bindParam(':identificacion', $Identificacion);
        $statement->bindParam(':tipo_identificacion', $tipo_identificacion);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':apellido', $apellido);
        $statement->bindParam(':celular', $celular);
        $statement->bindParam(':direccion', $direccion);
        if($statement->execute()){
            header('Location ../Pages/index.php');
        }else{
            header('Location ../Pages/add.php');
        }
    }

    public function get(){
        $rows = null;
        $statement = $this->db->prepare("SELECT * FROM  cliente");
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;
    }

    public function getByID($ID){
        $rows = null;
        $statement = $this->db->prepare("SELECT * FROM  cliente WHERE clie_codigo =:ID");
        $statement->bindParam(':ID',$ID);
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;
    }

    public function update($ID, $Identificacion, $tipo_identificacion, $nombre, $apellido, $celular, $direccion){
        $statement = $this->db->prepare("UPDATE cliente SET adcliemin_identificacion = :identificacion, clie_tipo_identificacion = :tipo_identificacion,
        clie_nombre = :nombre, clie_apellido = :apellido, clie_celular = :celular, clie_direccion = :direccion WHERE clie_codigo =:ID");
        $statement->bindParam(':identificacion',$Identificacion);
        $statement->bindParam(':tipo_identificacion',$tipo_identificacion);
        $statement->bindParam(':nombre',$nombre);
        $statement->bindParam(':apellido',$apellido);
        $statement->bindParam(':celular',$celular);
        $statement->bindParam(':direccion',$direccion);
        $statement->bindParam(':ID',$ID);
        if($statement->execute()){
            header('Location: ../Pages/index.php');
        }else{
            header('Location: ../Pages/edit.php');
        }
    }

    public function delete($ID){
        $statement = $this->db->prepare("DELETE FROM cliente WHERE clie_codigo = :ID ");
        $statement->bindParam(':ID',$ID);
        if($statement->execute()){
            header('Location: ../Pages/index.php');
        }else{
            header('Location: ../Pages/delete.php');
        }
    }
    



}
 
?>