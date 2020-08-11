<?php
class Conexion{
    private $connection;

    //contructor  que crear la conexion
    public  function __construct(){

        try{
            $this->connection = new PDO('mysql:host=localhost;dbname=bdsidisano', 'root', '20161014');
            $this->connection->exec("SET CHARACTER SET utf8");
        }catch (PDOException $e){
            print "Error!: " . $e->getMessage();
            die();
        }
    }

    //metodo que  cierra la conexion
    public function closeConnection( $con ) {
        $con=null;
     }

    //Obterner conexion
    public function getConnection(){
        return $this->connection;
    }

    public function prepare($sql)
    {
        return $this->connection->prepare($sql);
    }
}

// $connection = new Conexion();
// var_dump($connection->getConnection());