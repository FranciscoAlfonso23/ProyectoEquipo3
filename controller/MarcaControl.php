<?php

$operacion = $_POST['option'];
//.......................LLamar archivos.......................................
//SINGLETON
require '../model/singleton/Smarca.php';

$marca = new SingletonMarca();


switch($operacion)
    {
        case 'insert':
            //Implmentar MVC y singleton
            $marca->setMarca($_POST['marca']);
             $marca->insertData();
        break;

        case 'update':
             //IMPLEMENTAR MVC y singleton
             $marca->setId($_POST['id']);
             $marca->setMarca($_POST['marca']);
             $marca->updatetData();
        break;

        case 'delete':
             //IMPLEMENTAR MVC y singleton
             $marca->setId($_POST['id']);
             $marca->deleteData();
        break;

        case 'showdata':
             //IMPLEMENTAR MVC y singleton
            echo $marca->getData();

        break;
        case 'count':
            //implementar MVC Y SINGLETON
            echo $marca->countRegister();
        break;
}