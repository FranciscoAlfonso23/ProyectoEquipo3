<?php
require('conexion.php');
class MVCProducto {
    protected $db;
    protected $con;
    protected $params;
    private $sql;

    private $id;
    private $nombre;
    private $precioU;
    private $precioV;
    private $marca;
    private $proveedor;    

    public function setProveedor( $proveedor){
        $this->proveedor = $proveedor;
    }

    public function getProveedor( ){
       return $this->proveedor;
    }

    public function setNombre( $nombre){
        $this->nombre = $nombre;
    }

    public function getNombre( ){
       return $this->nombre;
    }

    public function setPrecioU( $precioU){
        $this->precioU = $precioU;
    }

    public function getPrecioU( ){
       return $this->precioU;
    }

    public function setPrecioV( $precioV){
        $this->precioV = $precioV;
    }

    public function getPrecioV( ){
       return $this->precioV;
    }

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
        $this->sql="INSERT INTO tblproducto(vchCodProducto,vchNombre,fltPrecioUnitario,intExistencia,fltPrecioVenta,intClaveMarca,intClaveProveedor) VALUES(?,?,0,0,0,?,?)"; 
        $this->params = $this->con->prepare($this->sql);
        $this->params->bindParam(1,$this->id);
        $this->params->bindParam(2,$this->nombre);
        $this->params->bindParam(3,$this->marca);
        $this->params->bindParam(4,$this->proveedor);
        $this->params->execute(); 
        $this->closeConnection();
    }

    public function updatetData(){
        $this->sql="UPDATE tblProducto
                    SET vchNombre = ?,intClaveMarca = ?,intClaveProveedor = ?
                    WHERE vchCodProducto = ?"; 
        $this->params = $this->con->prepare($this->sql);
        $this->params->bindParam(1,$this->nombre);
        $this->params->bindParam(2,$this->marca);
        $this->params->bindParam(3,$this->proveedor);
        $this->params->bindParam(4,$this->id);
        $this->params->execute();
        $this->closeConnection();
    }
    
    public function deleteData(){
        $this->sql="DELETE FROM tblProducto
                    WHERE vchCodProducto = ? "; 
        $this->params = $this->con->prepare($this->sql);
        $this->params->bindParam(1,$this->id);
        $this->params->execute();
        $this->closeConnection();
    }
    
    public function getData(){
       $this->sql="SELECT  vchCodProducto,vchNombre,intClaveMarca,intClaveProveedor
                    FROM tblProducto";  
       $this->params = $this->con->prepare($this->sql);
       $this->params->execute();
       $data=$this->params->fetchAll(PDO::FETCH_ASSOC);
       $this->closeConnection();
       return json_encode($data, JSON_UNESCAPED_UNICODE);
       //el json que genera los encabezados son los nombres de tu campos osaa estos : intClaveMarca,vchMarca
    }

    public function countRegister(){
        $this->sql = "SELECT count(*) AS totalRegister FROM tblProducto";
        $this->params = $this->con->prepare($this->sql);
        $this->params->execute();
        $data=$this->params->fetchAll(PDO::FETCH_ASSOC);
         $this->closeConnection();
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

}