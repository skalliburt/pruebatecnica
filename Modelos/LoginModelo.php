<?php

class LoginModelo extends DB{

    public function __construct(){

        parent::__construct();
    }

    public static function login(string $usuario, string $pass)
    {
        $sql = "SELECT * FROM USUARIOS WHERE NOMBRE_USUARIO= :NOMBRE_USUARIO AND CONTRASENA_USUARIO =:CONTRASENA_USUARIO LIMIT 1";
        return ($rows = parent::query($sql, ['NOMBRE_USUARIO' => $usuario, 'CONTRASENA_USUARIO' => $pass])) ? $rows[0] : [];
    }
}