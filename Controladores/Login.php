<?php

class Login extends Controlador{
    public function __construct(){
        if (isset($_SESSION['login'])) {
            header('Location:' . base_url . 'Dashboard');
        }
        parent::__construct();
    }

    public function index(){
        $data['function_js'] = 'Login.js';
        $this->vistas->getVistas($this,'index',$data);
    }

    public function acceso(){
        $array = [];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $usuario = $_POST['inputText'];
            $contrasena = $_POST['inputPassword'];

            $respuesta = LoginModelo::login($usuario, hash("sha256", $contrasena ));
            if(empty($respuesta)){
                $array = ['error' => 'El usuario o las credenciales no existen.'];
            }else{
                $_SESSION['idusuario'] = $respuesta['ID_USUARIO'];
                $_SESSION['login'] = true;
                $array = ['msg' => 'Bienvenido'];
            }
        }
        echo json_encode($array,JSON_UNESCAPED_UNICODE);
    }
}