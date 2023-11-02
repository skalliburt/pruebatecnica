<?php

const base_url = 'http://localhost/pruebatecnica/';

//CONEXION A BASE DE DATOS

const DB_HOST = "localhost";
const DB_NAME = "prueba";
const DB_USER = "root";
const DB_PASSWORD = "toor";
const DB_CHARSET = "utf8mb4";

//CONTROLADORES Y METODOS DEFAULT
define('CONTROLLER_DEFAULT', 'Login');
define('METHOD_DEFAULT', 'index');
define('CONTROLLER_ERROR', 'Error404');

//DIRECTORIOS APP
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__));
define('CONTROLLER', ROOT . DS . 'Controladores');
define('VIEW', ROOT . DS . "Vistas");
define('TEMPLATE', VIEW . DS . "Templates");