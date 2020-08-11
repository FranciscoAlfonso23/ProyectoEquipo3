<?php

class SingletonConexion{
    private $connection;
    private static $_instance;
    private static $instancia;
    private $conexion;

    private function __construct()
    {
        try {
 
            $this->connection = new PDO('mysql:host=localhost;dbname=bdsidisano', 'root', '20161014');
            $this->connection->exec("SET CHARACTER SET utf8");
 
        } catch (PDOException $e) {
 
            print "Error!: " . $e->getMessage();
 
            die();
        }
    }

    public function getConnection(){
        return $this->connection;
    }

    public function prepare($sql)
    {
        return $this->conexion->prepare($sql);
 
    }

    public static function getInstanceSingleton()
    {
 
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
 
        }
        return self::$instancia;
        
    }
 
     // Evita que el objeto se pueda clonar
    public function __clone()
    {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }

    public function closeConnection( $con ) {
        $con=null;
     }
}
