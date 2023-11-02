<?php
 
 class Conexion{

    private $conecta;

    public function __construct(){

        $cadenaConexion = "mysql:host=" .DB_HOST. ";dbname=" .DB_NAME. ";charset=" .DB_CHARSET;
        try{
            $this->conecta = new PDO($cadenaConexion, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'"));
            $this->conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function conecta(){
        return $this->conecta;
    }

    public static function query($sql, $parametros=[]){
        $db = new Conexion();
        $link = (object)$db->conecta();
        $link->beginTransaction();
        $query = $link->prepare($sql);

        if(!$query->execute($parametros)){
            $link->rollBack();
            $error = $query->errorInfo();
            throw new Exception($error[2]);
        }

        if (strpos($sql,'SELECT') !== false) {
            return $query->rowCount() > 0 ? $query->fetchAll(PDO::FETCH_ASSOC) : false;
        } elseif (strpos($sql, 'INSERT') !== false) {
            $id = $link->lastInsertId();
            $link->commit();
            return $id;
        } elseif (strpos($sql, 'UPDATE') !== false) {
            $link->commit();
            return true;
        }elseif (strpos($sql, 'DELETE') !== false) {
            if ($query->rowCount() > 0) {
                $link->commit();
                return true;
            }

            $link->rollBack();
            return false; 

        } else {
            
            $link->commit();
            return true;
        }
    }
 }