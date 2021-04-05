<?php

class Conexion
{

    /* ===================== 
	  CONEXION A LA DB 
	========================= */
    static public function conectar()
    {
        try {
            # CONEXION PRUEBAS
            $link = new PDO(
                "mysql:host=127.0.0.1;dbname=personalwebservicepostman;charset=utf8mb4",
                "root",
                "root"
            );

            $link->exec("set names utf8");
            return $link;
            
        } catch (PDOException $exception) {
            return $exception->getMessage();
        }

    }
}
