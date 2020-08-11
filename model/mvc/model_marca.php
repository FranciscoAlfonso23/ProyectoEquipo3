<?php
require('conexion.php');
class MVCMarca {
    protected $db;
    protected $con;
    protected $params;
    private $sql;

    private $id;
    private $marca;
    

    public function setMarca( $marca){
        $this->marca = $marca;
    }

    public function getMarca( ){
       return $this->marca;

    }

    public function setId( $id ){
        $this->id = $id;
    }

    public function getId(){
      return $this->id;
    }
    
    public function __construct(){
        $this->startDB();
    }

    public function startDB(){
        $this->db = new Conexion();
        $this->con = $this->db->getConnection(); 
    }

    public function closeConnection(){
        $this->db->closeConnection( $this->con );
     }  

    public function insertData(){
        $this->sql="INSERT INTO tblmarca(vchMarca) VALUES(?)"; 
        $this->params = $this->con->prepare($this->sql);
        $this->params->bindParam(1,$this->marca);
        $this->params->execute(); 
        $this->closeConnection();
    }

    public function updatetData(){
        $this->sql="UPDATE tblMarca
                    SET vchMarca = ?
                    WHERE intClaveMarca = ?"; 
        $this->params = $this->con->prepare($this->sql);
        $this->params->bindParam(1,$this->marca);
        $this->params->bindParam(2,$this->id);
        $this->params->execute();
        $this->closeConnection();
    }
    
    public function deleteData(){
        $this->sql="DELETE FROM tblMarca
                    WHERE intClaveMarca = ? "; 
        $this->params = $this->con->prepare($this->sql);
        $this->params->bindParam(1,$this->id);
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
       //el json que genera los encabezados son los nombres de tu campos osaa estos : intClaveMarca,vchMarca
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