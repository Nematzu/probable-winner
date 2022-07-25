<?php

require_once('../../Conexion.php');
session_start();

class Usuario extends Conexion{

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function add($Identificacion, $tipo_identificacion, $nombre, $apellido, $celular, $direccion, $password, $estado){
        $statement = $this->db->prepare("INSERT INTO  usuario(usua_Identificacion, usua_tipo_identificacion, 
        usua_nombre, usua_apellido, usua_celular, usua_direccion, usua_password, usua_estado) 
        VALUE (:identificacion, :tipo_identificacion, :nombre, :apellido, :celular, :direccion, :password, :estado)");

        $statement->bindParam(':identificacion', $Identificacion);
        $statement->bindParam(':tipo_identificacion', $tipo_identificacion);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':apellido', $apellido);
        $statement->bindParam(':celular', $celular);
        $statement->bindParam(':direccion', $direccion);
        $statement->bindParam(':password', $password);
        $statement->bindParam(':estado', $estado);

        if($statement->execute()){
            header('Location: ../vista/CRUDUsuarios.php');
        }else{
            header('Location: ../vista/CRUDUsuarios.php');
        }
    }

    public function get(){
        $rows = null;
        $statement = $this->db->prepare("SELECT * FROM  usuario");
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;
    }

    public function getByID($ID){
        $rows = null;
        $statement = $this->db->prepare("SELECT * FROM  usuario WHERE usua_codigo =:ID");
        $statement->bindParam(':ID',$ID);
        $statement->execute();
        while($result = $statement->fetch()){
            $rows[] = $result;
        }
        return $rows;
    }

    public function update($ID, $Identificacion, $tipo_identificacion, $nombre, $apellido, $celular, $direccion, $password, $estado){
        $statement = $this->db->prepare("UPDATE usuario SET usua_identificacion = :identificacion, usua_tipo_identificacion = :tipo_identificacion,
        usua_nombre = :nombre, usua_apellido = :apellido, usua_celular = :celular, usua_direccion = :direccion, usua_password = :password, usua_estado = :estado 
        WHERE usua_codigo =:ID");
        $statement->bindParam(':ID', $ID);
        $statement->bindParam(':identificacion', $Identificacion);
        $statement->bindParam(':tipo_identificacion', $tipo_identificacion);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':apellido', $apellido);
        $statement->bindParam(':celular', $celular);
        $statement->bindParam(':direccion', $direccion);
        $statement->bindParam(':password', $password);
        $statement->bindParam(':estado', $estado);

        if($statement->execute()){
            header('Location: ../vista/CRUDUsuarios.php');
        }else{
            header('Location: ../Pages/edit.php');
        }
    }

    public function delete($ID){
        $statement = $this->db->prepare("DELETE FROM usuario WHERE usua_codigo = :ID ");
        $statement->bindParam(':ID',$ID);
        if($statement->execute()){
            header('Location: ../vista/CRUDUsuarios.php');
        }else{
            header('Location: ../Pages/delete.php');
        }
    }
    
    public function login($Usuario, $Password){
        $statement = $this->db->prepare("SELECT * FROM usuario WHERE usua_nombre = :Usuario AND usua_password = :Password");
        $statement->bindParam(':Usuario',$Usuario);
        $statement->bindParam(':Password',$Password);
        $statement->execute();
        
        if ($statement->rowCount() == 1) {
            $result = $statement->fetch();
            $_SESSION['NOMBRE'] = $result['usua_nombre'];
            $_SESSION['ID'] = $result['usua_codigo'];
            $_SESSION['ROL'] = $result['usua_rol_ID_fk'];
            return true;
        }
        return false;
    }

    public function getNombre(){
        return $_SESSION['NOMBRE'];
    }

    public function getID(){
        return $_SESSION['ID'];
    }

    public function getRol(){
        return $_SESSION['ROL'];
    }


    public function validateSession(){
        if($_SESSION['ID'] == null){
            header('Location: ../../login.php');
        }
    }

    public function validateSessionAdministrador(){
        if($_SESSION['ID'] != null){
            if($_SESSION['ROL'] == 'Administrador'){
                header('Location ../../Usuario/vista/index.php');
            }else{
                header('../../index.php');
            }
        }
    }


}
 
?>