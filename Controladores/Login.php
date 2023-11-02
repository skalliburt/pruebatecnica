<?php

class Login extends Controlador{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $data['function.js'] = 'Login.js';
        $this->vista->getVistas($this,'index',$data);
    }
}