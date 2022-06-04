<?php
require_once("config/database.php");
class CategoriaController
{
    public static function ObtenerCategorias()
    {
        $conexionBD = Conectar::crearInstancia();
        $sql = $conexionBD->query("SELECT * FROM categoria");
        foreach ($sql->fetchAll() as $data) {
            $id = $data['id_categoria'];
            $nombre = $data['nombre'];
            echo "<option value=\"$id\">$nombre</option>";
        }
    }
}
