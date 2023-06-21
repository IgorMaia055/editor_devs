<?php

namespace sistem\Nucleo;

use PDO;
use PDOException;

class Connection 
{
    private static $instancia;

    public static function getInstancia()
    {
        if(empty($instancia)){
            try {
                self::$instancia = new PDO('mysql: host='.HOST.'; dbname='.DB_NAME.'',  USER, PASS , [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    PDO::ATTR_CASE => PDO::CASE_NATURAL
                ]);
            } catch (PDOException $err) {
                die('Erro de conexão => '.$err);
            }
        }
        return self::$instancia;
    }

    private function __clone():void {}
}