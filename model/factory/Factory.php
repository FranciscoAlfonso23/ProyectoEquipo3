<?php
require '../model/mvc/conexion.php';
require '../model/mvc/model_marca.php';
require '../model/mvc/model_proveedor.php';
// require '../model/mvc/model_mvc_moneda.php';
// require '../model/mvc/model_mvc_estancia.php';
// require '../model/mvc/model_mvc_grado_conocimiento.php';

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
        //     case 'moneda':
        //          $facoryObeject = new MVCMoneda();
        //         break;
        //    case 'conocimiento':
        //             $facoryObeject = new MVCGradoConocimiento();
        //            break;
        //     case 'estancia':
        //         $facoryObeject = new MVCEstancia();
        //         break;
        }

        return $facoryObeject;
    }
}