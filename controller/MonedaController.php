<?php
require_once("config/database.php");
class MonedaController
{
    public static function ObtenerMonedas()
    {
        $conexionBD = Conectar::crearInstancia();
        $sql = $conexionBD->query("SELECT * FROM moneda");
        foreach ($sql->fetchAll() as $moneda) {
            $id_moneda = $moneda['id_moneda'];
            $nombre = $moneda['nombre'];
            echo "<option value=\"$id_moneda\">$nombre</option>";
        }
    }
}
