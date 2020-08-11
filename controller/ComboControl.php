<?php 
require '../model/factory/Factory.php';
//option para elegir la instancia
$opcionCombo = $_POST['option'];

switch($opcionCombo){
    case 'instanciarMarca':
        $comboMarca = FactoryCombos::crearfactory('marca');
        echo $comboCategoria->getData();
    break;
    
    case 'instanciarProveedor':
        $comboProveedor = FactoryCombos::crearfactory('proveedor');
        echo $comboProveedor->getData();
    break;

    // case 'instanciarMoneda':
    //     $comboMoneda = ModelFactoryProducerCombos::crearfactory('moneda');
    //     echo $comboMoneda->getData();
    // break;
    // case 'instanciarConocimiento':
    //     $comboConocimiento = ModelFactoryProducerCombos::crearfactory('conocimiento');
    //     echo $comboConocimiento->getData();
    // break;
    // case 'instanciarEstancia':
    //     $comboEstancia = ModelFactoryProducerCombos::crearfactory('estancia');
    //     echo $comboEstancia->getData();
    // break;
}
