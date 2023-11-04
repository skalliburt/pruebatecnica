<?php

class DashboardModelo extends DB{
    public function __construct(){

        parent::__construct();
    }

    public static function proceso(){
        $respuesta = DB::SQL("SELECT * FROM `PRO_PROCESO`");
        return $respuesta;
    }

    public static function tipoDoc(){
        $respuesta = DB::SQL("SELECT * FROM `TIP_TIPO_DOC`");
        return $respuesta;
    }

    public static function ultimoregistro($consecutivo){
        $respuesta = DB::SQL("SELECT MAX(CAST(SUBSTRING_INDEX(DOC_CODIGO, '-', -1) AS UNSIGNED)) AS ultimo_consecutivo FROM `DOC_DOCUMENTO` WHERE DOC_CODIGO LIKE '$consecutivo%'");
        return $respuesta;
    }

    public static function listaDocumentos(){
        $respuesta = DB::SQL("SELECT * FROM `DOC_DOCUMENTO`");
        return $respuesta;
    }

    
}