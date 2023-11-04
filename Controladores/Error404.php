<?php

class Error404 extends Controlador{


  public function index()
  {

    $this->vistas->getVistas($this,'index');
  }

}