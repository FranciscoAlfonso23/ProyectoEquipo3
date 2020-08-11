<?php
require '../model/mvc/conexion.php';
require '../model/mvc/model_marca.php';
require '../model/mvc/model_proveedor.php';
require '../model/mvc/model_producto.php';
class FacadeOperationDB{
    private $marca;
    private $proveedor;
    private $producto;

    public function __construct(){
        $this->marca = new MVCMarca();
        $this->proveedor = new MVCProveedor();
        $this->producto = new MVCProducto();
    }

    public function facadeGetData($optionModule){
        switch($optionModule){
              case 'marca':
                echo $this->marca->getData();
              break;
              case 'proveedor':
                echo $this->proveedor->getData();
              break;
              case 'producto':
                echo $this->producto->getData();
              break;
        }
    }   
    
    public function facadeCountRegister($optionModule){
        switch($optionModule){
            case 'marca':
              echo $this->marca->countRegister();
            break;
            case 'proveedor':
              echo $this->proveedor->countRegister();
            break;
            case 'producto':
              echo $this->producto->countRegister();
            break;
      }
    }
    
}