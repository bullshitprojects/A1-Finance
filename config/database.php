<?php
    class Conectar {
        public static function conexion(){
            $conexion = new mysqli("localhost", "root", "12345", "db_A1Fiance");
            return $conexion;
        }
    }
?>