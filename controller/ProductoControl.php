<?php

$operacion = $_POST['option'];
//.......................LLamar archivos.......................................
//SINGLETON
require '../model/singleton/Sproveedor.php';

//mvc
// require '../model/mvc/model_marca.php';

//DAO
// require '../model/DAO/DAO_marca.php';
//------------------------------ instancia patrones de diseño------------------------------------
//instanciar Singleton
$proveedor = new SingletonProveedor();

//instaciar marca de pattron mvc 
// $marca = new MVCMarca();

//instancia para DAO Y VO
// $dao = new DAOMarca();
// $VOMarca = new VOMarca();
switch($operacion)
    {
        case 'insert':
            //Implmentar MVC y singleton
            $proveedor->setProveedor($_POST['proveedor']);
            $proveedor->setCorreo($_POST['correo']);
            $proveedor->setTelefono($_POST['telefono']);
            $proveedor->insertData();


            // implementar DAO Y VO
            // $VOMarca->setMarca($_POST['marca']);
            // echo $dao->insert($VOMarca);
        break;

        case 'update':
             //IMPLEMENTAR MVC y singleton
             $proveedor->setId($_POST['id']);
             $proveedor->setProveedor($_POST['proveedor']);
             $proveedor->setCorreo($_POST['correo']);
             $proveedor->setTelefono($_POST['telefono']);
             $proveedor->updatetData();
             //implementar DAO Y VO
            //  $VOMarca->setId($_POST['id']);
            //  $VOMarca->setMarca($_POST['marca']);
            //  echo $dao->update($VOMarca);
        break;

        case 'delete':
             //IMPLEMENTAR MVC y singleton
             $proveedor->setId($_POST['id']);
             $proveedor->deleteData();
             //implementar DAO Y VO
            //  $VOMarca->setId($_POST['id']);
            //  echo $dao->delete($VOMarca);
        break;

        case 'showdata':
             //IMPLEMENTAR MVC y singleton
            echo $proveedor->getData();
            //implementando DAO
            // echo $dao->getData(); 
        break;
        case 'count':
            //implementar MVC Y SINGLETON
            echo $proveedor->countRegister();
            //  implementando DAO
            // echo $dao->countRegister(); 
        break;
}