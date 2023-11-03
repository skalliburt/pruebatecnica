<?php

class Dashboard extends Controlador{
    public function __construct(){
        Auth::noAuth();
        parent::__construct();
    }

    public function index(){
        $data['function_js'] = 'Dashboard.js';
        $this->vistas->getVistas($this,'index',$data);
    }
}