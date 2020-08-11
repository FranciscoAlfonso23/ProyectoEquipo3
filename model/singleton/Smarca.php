<?php
require ('Sconexion.php');
require ('../model/mvc/model_marca.php');

class SingletonMarca extends MVCMarca {
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