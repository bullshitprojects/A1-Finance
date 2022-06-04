<?php
require_once("config/database.php");
class TipoTransaccionController
{
    public static function ObtenerTipos()
    {
        $conexionBD = Conectar::crearInstancia();
        $sql = $conexionBD->query("SELECT * FROM tipo_transaccion");
        foreach ($sql->fetchAll() as $data) {
            $id = $data['id_tipo_transaccion'];
            $nombre = $data['descripcion'];
            echo "<option value=\"$id\">$nombre</option>";
        }
    }
}
