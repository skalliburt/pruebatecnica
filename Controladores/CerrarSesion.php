<?php

class CerrarSesion extends Controlador{
    public function index(){
        session_destroy();
        $_SESSION = [];
        header('Location:http://localhost/pruebatecnica/');
    }
}