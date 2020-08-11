<?php

require('../model/mvc/conexion.php');
require('../model/VO/VO_marca.php');

class DAOMarca{
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

    public function insert($marca)
    {   
        $nameMarca = $marca->getMarca();
        $this->sql="INSERT INTO tblmarca(vchMarca) VALUES(?)"; 
        $this->params = $this->con->prepare($this->sql);
        $this->params->bindParam(1,$nameMarca);
        $this->params->execute(); 
        $this->closeConnection();
    }

    public function update($marca)
    {
        $id =   $nameMarca = $marca->getId();
        $nameMarca = $marca->getMarca();

        $this->sql="UPDATE tblMarca
        SET vchMarca = ?
        WHERE intClaveMarca = ?"; 
        $this->params = $this->con->prepare($this->sql);
        $this->params->bindParam(1,$nameMarca);
        $this->params->bindParam(2,$id);
        $this->params->execute();
        $this->closeConnection();
    }

    public function delete($marca){
        $id =   $nameMarca = $marca->getId();
        $this->sql="DELETE FROM tblMarca
                    WHERE intClaveMarca = ? "; 
        $this->params = $this->con->prepare($this->sql);
        $this->params->bindParam(1,$id);
        $this->params->execute();
        $this->closeConnection();
     
    }

    public function getData(){
        $this->sql="SELECT  intClaveMarca,vchMarca
                    FROM tblMarca";  
       $this->params = $this->con->prepare($this->sql);
       $this->params->execute();
       $data=$this->params->fetchAll(PDO::FETCH_ASSOC);
       $this->closeConnection();
       return json_encode($data, JSON_UNESCAPED_UNICODE);
     }

     public function countRegister(){
        $this->sql = "SELECT count(*) AS totalRegister FROM tblMarca";
        $this->params = $this->con->prepare($this->sql);
        $this->params->execute();
        $data=$this->params->fetchAll(PDO::FETCH_ASSOC);
         $this->closeConnection();
         return json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}

