<?php

class Controlador{

    public function __construct(){
        $this->vistas = new Vistas();
        $this->updateModelo();
    }

    //CARGDA DE LOS ARCHIVOS DEL MODELO
    public function updateModelo(){

        $modelo = get_class($this).'Modelo';
        $ruta = 'Modelos/'.$modelo.'.php';

        if(file_exists($ruta)){
            require_once $ruta;
            $this->modelo = new $modelo();
        }
    }
}