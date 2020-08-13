<?php
require '../model/mvc/conexion.php';
require '../model/mvc/model_marca.php';
require '../model/mvc/model_proveedor.php';

class FactoryCombos{
    public static function crearfactory( $combo){
        $facoryObeject;

        switch ($combo) {
            case 'marca':
                 $facoryObeject = new MVCMarca();
                break;
            case 'proveedor':
                 $facoryObeject = new MVCProveedor();
                break;
        }
        return $facoryObeject;
    }
}