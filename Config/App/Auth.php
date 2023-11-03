<?php
 class Auth{

    public static function sessionUser(int $idUser){
        $response = DB::SQL("SELECT * FROM `USUARIOS` WHERE ID_USUARIO = {$idUser}");
        $_SESSION['userData'] = $response[0];
        return $response[0];
    }

    public static function noAuth()
    {
        if (!isset($_SESSION['login'])) {
            header('Location:' . base_url);
        }
    }

 }