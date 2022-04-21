<?php
    //Crear usuario en la base de datos
    class Conectar {
        private static $instancia = NULL;
        public static function crearInstancia(){
            $host="localhost";
            $dbname="db_A1Finance";
            $username="A1root";
            $pass="123456";
            if (!isset(self::$instancia)) {
                $opcionesPDO[PDO::ATTR_ERRMODE]= PDO::ERRMODE_EXCEPTION;
                self::$instancia = new PDO ("mysql:host=$host;dbname=$dbname",$username,$pass,$opcionesPDO);
            }
            return self::$instancia;
            }
        
    }
?>