<?php

session_start();

require_once 'config/config.php';
require_once 'helper/helper.php';

// url proviene de la configuracion de htacces
$route = !empty($_GET['url']) ? $_GET['url'] : CONTROLLER_DEFAULT."/".METHOD_DEFAULT;
$array = explode('/', $route);

$controller = $array[0];
$method = METHOD_DEFAULT;
$parameter = '';

//asigna el valor del controlador
if(!empty($array[1])){
    if(!empty($array[1]) != ''){
        $method = $array[1];
    }
}

//asigna el valor del metodo y parametro
if(!empty($array[2])){
    if(!empty($array[2]) != ''){
        for($i=2; $i<count($array); $i++){
            $parameter .= $array[$i] .',';
        }
        $parameter = trim($parameter, ',');
    }
}

require_once 'Config/App/autoload.php';

$idController = CONTROLLER. DS .$controller. '.php';
$errorController = CONTROLLER.'/'.CONTROLLER_ERROR.'.php';

if(file_exists($idController)){
    require_once $idController;
    $controller = new $controller();
    if(method_exists($controller, $method)){
        $controller->$method($parameter);
    }else{
        require_once $errorController;
        $controller = new Error404;
        $controller->index();
        
    }
}else{
    require_once $errorController;
    $controller = new Error404;
    $controller->index();
}