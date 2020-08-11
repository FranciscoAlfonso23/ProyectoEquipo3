<?php

require('../model/mvc/conexion.php');
require('../model/VO/VO_proveedor.php');

class DAOProducto{
    private $database;
    private $con;
    private $params;
    private $sql;

    public function __construct()
    {
        $this->startBD();
    }

    public function startBD()
    {
        $this->database = new Conexion();
        $this->con = $this->database->getConnection();
    }

    public function closeConnection()
    {
        $this->database->closeConnection($this->con);
    }

    public function insert($proveedor)
    {   
        $nameProveedor = $proveedor->getProveedor();
        $correo = $proveedor->getCorreo();
        $telefono = $proveedor->getTelefono();
        $this->sql="INSERT INTO tblproveedor(vchProveedor,vchCorreo,vchTelefono) VALUES(?,?,?)"; 
        $this->params = $this->con->prepare($this->sql);
        $this->params->bindParam(1,$nameProveedor);
        $this->params->bindParam(2,$correo);
        $this->params->bindParam(3,$telefono);
        $this->params->execute(); 
        $this->closeConnection();
    }

    public function update($proveedor)
    {
        $id = $nameProveedor = $proveedor->getId();
        $nameProveedor = $proveedor->getProveedor();
        $correo = $proveedor->getCorreo();
        $telefono = $proveedor->getTelefono();

        $this->sql="UPDATE tblProveedor
        SET vchProveedor = ?,vchCorreo = ?,vchTelefonoo = ?
        WHERE intClaveProveedor = ?"; 
        $this->params = $this->con->prepare($this->sql);
        $this->params->bindParam(1,$nameProveedor);
        $this->params->bindParam(2,$correo);
        $this->params->bindParam(3,$telefono);
        $this->params->bindParam(4,$id);
        $this->params->execute();
        $this->closeConnection();
    }

    public function delete($proveedor){
        $id =   $nameProveedor = $proveedor->getId();
        $this->sql="DELETE FROM tblProveedor
                    WHERE intClaveProveedor = ? "; 
        $this->params = $this->con->prepare($this->sql);
        $this->params->bindParam(1,$id);
        $this->params->execute();
        $this->closeConnection();
     
    }

    public function getData(){
        $this->sql="SELECT  intClaveProveedor,vchProveedor,vchCorreo,vchTelefono
                    FROM tblProveedor";  
       $this->params = $this->con->prepare($this->sql);
       $this->params->execute();
       $data=$this->params->fetchAll(PDO::FETCH_ASSOC);
       $this->closeConnection();
       return json_encode($data, JSON_UNESCAPED_UNICODE);
     }

     public function countRegister(){
        $this->sql = "SELECT count(*) AS totalRegister FROM tblProveedor";
        $this->params = $this->con->prepare($this->sql);
        $this->params->execute();
        $data=$this->params->fetchAll(PDO::FETCH_ASSOC);
         $this->closeConnection();
         return json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}

