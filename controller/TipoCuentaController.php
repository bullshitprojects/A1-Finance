<?php
require_once("model/TipoCuenta.php");
require_once("config/database.php");
class TipoCuentaController
{
    public static function ObtenerCuentas()
    {
        $conexionBD = Conectar::crearInstancia();
        $sql = $conexionBD->query("SELECT * FROM tipo_cuenta");
        foreach ($sql->fetchAll() as $cuenta) {
            $id = $cuenta['id_tipo_cuenta'];
            $nombre = $cuenta['tipo'];
            echo "<option value=\"$id\">$nombre</option>";
        }
    }
}
