<?php

$operacion = $_POST['option'];
//.......................LLamar archivos.......................................
//SINGLETON
require '../model/singleton/Smarca.php';

//mvc
// require '../model/mvc/model_marca.php';

//DAO
// require '../model/DAO/DAO_marca.php';
//------------------------------ instancia patrones de diseño------------------------------------
//instanciar Singleton
$marca = new SingletonMarca();

//instaciar marca de pattron mvc 
// $marca = new MVCMarca();

//instancia para DAO Y VO
// $dao = new DAOMarca();
// $VOMarca = new VOMarca();
switch($operacion)
    {
        case 'insert':
            //Implmentar MVC y singleton
            $marca->setMarca($_POST['marca']);
             $marca->insertData();


            // implementar DAO Y VO
            // $VOMarca->setMarca($_POST['marca']);
            // echo $dao->insert($VOMarca);
        break;

        case 'update':
             //IMPLEMENTAR MVC y singleton
             $marca->setId($_POST['id']);
             $marca->setMarca($_POST['marca']);
             $marca->updatetData();
             //implementar DAO Y VO
            //  $VOMarca->setId($_POST['id']);
            //  $VOMarca->setMarca($_POST['marca']);
            //  echo $dao->update($VOMarca);
        break;

        case 'delete':
             //IMPLEMENTAR MVC y singleton
             $marca->setId($_POST['id']);
             $marca->deleteData();
             //implementar DAO Y VO
            //  $VOMarca->setId($_POST['id']);
            //  echo $dao->delete($VOMarca);
        break;

        case 'showdata':
             //IMPLEMENTAR MVC y singleton
            echo $marca->getData();
            //implementando DAO
            // echo $dao->getData(); 
        break;
        case 'count':
            //implementar MVC Y SINGLETON
            echo $marca->countRegister();
            //  implementando DAO
            // echo $dao->countRegister(); 
        break;
}