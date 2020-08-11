<?php
require('conexion.php');
class MVCProveedor {
    protected $db;
    protected $con;
    protected $params;
    private $sql;

    private $id;
    private $proveedor;
    private $correo;
    private $telefono;
    

    public function setProveedor( $proveedor){
        $this->proveedor = $proveedor;
    }

    public function getProveedor( ){
       return $this->proveedor;
    }

    public function setCorreo( $correo){
        $this->correo = $correo;
    }

    public function getCorreo( ){
       return $this->correo;
    }

    public function setTelefono( $telefono){
        $this->telefono = $telefono;
    }

    public function getTelefono( ){
       return $this->telefono;
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
        $this->sql="INSERT INTO tblproveedor(vchProveedor,vchCorreo,vchTelefono) VALUES(?,?,?)"; 
        $this->params = $this->con->prepare($this->sql);
        $this->params->bindParam(1,$this->proveedor);
        $this->params->bindParam(2,$this->correo);
        $this->params->bindParam(3,$this->telefono);
        $this->params->execute(); 
        $this->closeConnection();
    }

    public function updatetData(){
        $this->sql="UPDATE tblProveedor
                    SET vchProveedor = ?,vchCorreo = ?,vchTelefono = ?
                    WHERE intClaveProveedor = ?"; 
        $this->params = $this->con->prepare($this->sql);
        $this->params->bindParam(1,$this->proveedor);
        $this->params->bindParam(2,$this->correo);
        $this->params->bindParam(3,$this->telefono);
        $this->params->bindParam(4,$this->id);
        $this->params->execute();
        $this->closeConnection();
    }
    
    public function deleteData(){
        $this->sql="DELETE FROM tblProveedor
                    WHERE intClaveProveedor = ? "; 
        $this->params = $this->con->prepare($this->sql);
        $this->params->bindParam(1,$this->id);
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
       //el json que genera los encabezados son los nombres de tu campos osaa estos : intClaveMarca,vchMarca
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