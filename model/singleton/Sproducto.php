<?php
require ('Sconexion.php');
require ('../model/mvc/model_producto.php');

class SingletonProducto extends MVCProducto {
    protected $db;
    protected $con;
    protected $params;
   

    public function __construct(){
        $this->startDB();
    }
    
    public function startDB(){
        $this->db = SingletonConexion::getInstanceSingleton();
        $this->con = $this->db->getConnection(); 
    }

}